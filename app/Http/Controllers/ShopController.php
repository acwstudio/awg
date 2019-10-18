<?php

namespace App\Http\Controllers;

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
        return view('shop.home');
    }
}
