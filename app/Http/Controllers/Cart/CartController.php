<?php

namespace App\Http\Controllers\Cart;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\AppConst;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->save();
        $cart->products()->attach($request->product_id, [
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        return redirect()->route('cart.show', ['cart'=> $cart->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = auth()->user()->id;
        $find_cart = Cart::where('user_id', $id)->where('accept', 0);

        $cartData = $find_cart->with(['products' => function($query){
            $query->paginate(AppConst::EXIST_PER_PAGE);
        }])->get();
        // return $cartData;
        return view('cart.show')->with('cartData', $cartData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $user_id = auth()->user()->id;
        $cart->delete();
        $cart->products()->detach();
        return redirect()->route('cart.show', ['cart'=> $user_id]);
    }
}
