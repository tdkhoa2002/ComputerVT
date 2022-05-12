<?php

namespace App\Http\Controllers;

use App\Models\CategoriesHomepage;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\AppConst;
use App\Models\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $categories_homepage = Categorieshomepage::with(['products' => function($query){
            $query->paginate(AppConst::PRODUCTS_PER_PAGE);
        }])->get(); //da lay ra duoc 5 san pham
        $user = auth()->user();
        return view('homepage')->with([
            'categories' => $categories,
            'categories_homepage' => $categories_homepage,
            'user' => $user,
        ]);
    }
}
