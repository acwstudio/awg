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
        $productsTotal = Product::all();
        $products = $productsTotal->whereBetween('id', [2978, 2998]);
        
        foreach ($products as $item) {
            $item->img_full_name = $item->img_name ? $item->img_name . $item->img_extension : 'product_empty.png';
        }

        return compact('user', 'categories', 'topLevelCategories', 'products');
    }

    public function srvShopShow($id)
    {
        $topLevelCategories = Category::where('category_id', '=', null)->with('children')->get();
        $product = Product::find($id);
        $product->img_full_name = $product->img_name ? $product->img_name . $product->img_extension : 'product_empty.png';

        return compact('topLevelCategories', 'product');
    }
}