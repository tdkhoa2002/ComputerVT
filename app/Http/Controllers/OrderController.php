<?php

namespace App\Http\Controllers;

use App\Models\AppConst;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::join('customers','orders.customer_id','=','customers.id' )->paginate(10);
        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->fill( $request->all() );
        $customer->save();

        $order = new Order;
        $order->customer_id = $customer->id;
        $order->date_order = date('Y-m-d H:i:s');
        $order->total = $request->total;
        $order->save();

        $carts = Cart::where('user_id', auth()->user()->id)->get();

        foreach($carts as $cart) {
            $order->carts()->attach($cart);
            $cart->accept = 1;
            $cart->save();
        };

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('accept', 0);

        $cartData = $cart->with(['products' => function($query){
            $query->paginate(AppConst::EXIST_PER_PAGE);
        }])->get();
        $sum = 0;
        foreach($cartData as $item) {
            foreach($item->products as $item1) {
                $sum += $item1->pivot->quantity * $item1->pivot->price;
            }
        }
        return view('cart.checkout')->with(['cartData' => $cartData, 'sum' => $sum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $orderData = Order::find($order->id);
        $orderData->status = $request->status;
        $orderData->save();
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->carts()->detach();
        $order->delete();
        return redirect()->route('order.index');
    }

    public function showOrder(Order $order) {
        $orderData = Order::join('customers', 'customers.id', '=', 'orders.customer_id')->with(['carts' => function($query) {
            $query->with('products');
        }])->find($order->id);
        return view('order.show')->with('order', $orderData);
    }
}
