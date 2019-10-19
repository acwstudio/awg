<?php

namespace App\Http\Controllers;

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
        $user = auth()->user();
//        \Illuminate\Support\Facades\Auth::user()->first_name;
        //$user_id = Auth::user()->getAuthIdentifier();

        //$user = User::findOrFail($user_id);
        //dd($user);
        return view('shop.home', compact('user'));
    }
}
