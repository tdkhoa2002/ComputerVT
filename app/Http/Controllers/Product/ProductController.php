<?php

namespace App\Http\Controllers\Product;

use App\Models\AppConst;
use App\Http\Controllers\Controller;
use App\Models\Categorieshomepage;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(AppConst::PRODUCTS_PER_PAGE);
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->fill( $request-> all() );
        $fileName = time().'.'.$request->image_url->getClientOriginalExtension();
        $request->image_url->move(public_path('storage/thumbnails/'), $fileName);
        $product->image_url = $fileName;
        $product->save();
        $product->categories()->attach($request->category_ids);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productInfo = Product::where('id', $product->id)->first();
        return view('product.show')->with('product', $productInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->delete();
        return redirect()->route('product.index');
    }

    public function setCategory(Request $request, Product $product)
    {
        $setProduct = Product::where('id', $product->id)->first();
        $setProduct->categories_homepage()->attach($request->category_id);
        return redirect('/admin/products');
    }

    public function deleteCategory(Product $product, Categorieshomepage $category)
    {
        $setProduct = Product::find($product->id);
        $setProduct->categories_homepage()->detach($category);
        return redirect('/admin/categories_homepage');
    }

    public function moveSetCategory(Product $product)
    {
        $setProduct = Product::where('id', $product->id)->first();
        return view('product.set_category')->with('product', $setProduct);
    }

    public function setHot(Product $product) {
        $setProduct = Product::find($product->id);
        $setProduct->update([
            $setProduct->is_hot = !$setProduct->is_hot
        ]);
        return redirect()->route('product.index');
    }

    public function uploadImage(Request $request) {
        $fileName = time().'.'.request()->image_url->getClientOriginalExtension();
        $img = Image::make($request->file('image_url')->getRealPath());
        $img->fit(250,250);
        $img->save(public_path('storage/thumbnails/' .$fileName));
        return response()->json(['fileName' => $fileName]);
    }
}
