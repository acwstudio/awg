<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * @return string
     */
    public function index()
    {
        $amtPositions = Product::all()->count();
        $amtCategories = Category::all()->count();
        $amtImages = Product::where('img_name', '!=', null)->count();

        return view('admin.dashboard', compact('amtPositions', 'amtCategories', 'amtImages'));
    }

}
