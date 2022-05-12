<?php

namespace App\Http\Controllers;

use App\Models\AppConst;
use App\Models\Categorieshomepage;
use App\Models\Product;
use Illuminate\Http\Request;

class CategorieshomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorieshomepage::paginate(AppConst::EXIST_PER_PAGE);
        return view('category_homepage.admin.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category_homepage.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categorieshomepage;
        $category->fill( $request->all() );
        $category->save();
        return redirect('/admin/categories_homepage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorieshomepage  $categories_homepage
     * @return \Illuminate\Http\Response
     */
    public function show(Categorieshomepage $categories_homepage)
    {
        $category = Categorieshomepage::find($categories_homepage)->first();
        $products = $category->products()->get();
        return view('category_homepage.user.show')->with([
            'products' => $products,
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorieshomepage  $categories_homepage
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorieshomepage $categories_homepage)
    {
        $updateCategory = Categorieshomepage::find($categories_homepage)->first();
        return view('category_homepage.admin.update')->with('category', $updateCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorieshomepage  $categories_homepage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorieshomepage $categories_homepage)
    {
        $categoryUpdate = Categorieshomepage::find($categories_homepage->id);
        $categoryUpdate->update([
            'name' => $request->name
        ]);
        return redirect('/categories_homepage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorieshomepage  $categories_homepage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorieshomepage $categories_homepage)
    {
        Categorieshomepage::find($categories_homepage->id)->delete();
        return redirect('/categories_homepage');
    }

    public function getCategories() {
        $categories = Categorieshomepage::all();
        return response()->json($categories);
    }

    public function listProductsInCategory (Categorieshomepage $categories_homepage) {
        $category = Categorieshomepage::find($categories_homepage)->first();
        $products = $category->products()->get();
        if(auth()->user()->role->name == "admin"){
            return view('category_homepage.admin.index_product')->with([
                'products' => $products,
                'category' => $category
            ]);
        }
    }
}
