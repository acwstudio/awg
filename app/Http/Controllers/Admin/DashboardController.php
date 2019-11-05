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
    protected $redis;

    /**
     * DashboardController constructor.
     *
     * @param \Redis $redis
     */
    public function __construct(\Redis $redis)
    {
        $this->middleware('auth:admin');
        $this->redis = $redis;
    }

    /**
     * @return string
     */
    public function index()
    {
        $amtPositions = Product::all()->count();
        $this->redis->set('api:products:offset', $amtPositions);
        $amtCategories = Category::all()->count();
        $this->redis->set('api:categories:offset', $amtCategories);
        $amtImages = Product::where('img_name', '!=', null)->count();

        return view('admin.dashboard', compact('amtPositions', 'amtCategories', 'amtImages'));
    }

}
