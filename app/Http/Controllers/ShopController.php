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
        $categories = Category::all();
//        foreach ($categories as $category) {
//            dump($category->categories);
//        }
//        dd($categories);

        return view('shop.home', compact('user', 'categories'));
    }
}
