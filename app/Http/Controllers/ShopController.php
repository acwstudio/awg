<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Auth;
use Illuminate\Http\Request;

/**
 * Class ShopController
 *
 * @package App\Http\Controllers
 */
class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::guard('customer')->user();
//        dd(Category::with('children')->get());
        $categories = Category::all();
        $topLevelCategories = Category::where('category_id', '=', null)->with('children')->get();

//        foreach ($categories as $category) {
//            if ($category->children->count() > 0) {
//                dump($category->children->count());
//            } else {
//                dump($category->name);
//            }
//            dump($category->parent);
//        }
        //dd($topLevelCategories);

        return view('shop.home', compact('user', 'categories', 'topLevelCategories'));
    }
}
