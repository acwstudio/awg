<?php

namespace App\Services\Shop;

use App\Category;
use App\Product;
use Auth;

/**
 * Class ServiceShopProducts
 *
 * @package App\Services\Shop
 */
class ServiceShopProducts
{
    protected $user;

    /**
     * ServiceShopProducts constructor.
     *
     */
    public function __construct()
    {
        $this->user = Auth::guard('customer')->user();
    }

    /**
     * @return array
     */
    public function srvShopIndex()
    {
        $categories = Category::all();
        $user = Auth::guard('customer')->user();
        $topLevelCategories = Category::where('category_id', '=', null)->with('children')->get();
        $products = Product::take(15)->get();

        return compact('user', 'categories', 'topLevelCategories', 'products');
    }
}