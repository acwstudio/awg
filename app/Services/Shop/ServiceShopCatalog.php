<?php

namespace App\Services\Shop;

use App\Category;
use Auth;

/**
 * Class ServiceShopCatalog
 *
 * @package App\Services\Shop
 */
class ServiceShopCatalog
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
    public function srvCatalogIndex($category_id)
    {
        $categories = Category::with('products')->get();

        $category = $categories->find($category_id);

        $products = $category->products;
        foreach ($products as $item) {
            $item->img_full_name = $item->img_name ? $item->img_name . $item->img_extension : 'product_empty.png';
        }
        $products = $products->take(12);

        $user = Auth::guard('customer')->user();

        $topLevelCategories = Category::where('category_id', '=', null)->with('children')->get();

        //$subCatalog =

        return compact('user', 'topLevelCategories', 'category', 'products');
    }
}