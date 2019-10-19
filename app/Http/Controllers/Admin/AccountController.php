<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

/**
 * Class AccountController
 *
 * @package App\Http\Controllers\Admin
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = Auth::user()->getAuthIdentifier();

        $user = User::findOrFail($user_id);
//        $user = User::first()->first_name;

        return view('admin.account', compact('user'));
    }
}
