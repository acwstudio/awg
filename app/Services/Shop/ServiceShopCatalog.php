<?php

namespace App\Services\Shop;

use App\Category;
use App\Product;
use Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

        /** @var Product $item */
        foreach ($products as $item) {
            $img_full_name = $item->store_product_images()->where('active', 1)->first();
            $item->img_full_name = $img_full_name ?
                $img_full_name->img_name . '.' . $img_full_name->img_ext : 'product_empty.png';
        }

        $products = $products->take(40);
//
        /** @var Collection $products */
        $mostViewed = $products->random(3);

        foreach ($mostViewed as $item) {
            $item->discount_price = $this->discount($item->price, 0.2);
            $item->percent = 20;
            $item->sub_name = $item->name ? Str::limit($item->name, 20) : Str::limit('товар без названия', 0, 20);
        }
        $mostViewedChunk = $mostViewed->chunk(4);

        $user = Auth::guard('customer')->user();

        $topLevelCategories = Category::where('category_id', '=', null)->with('children')->get();

        //$subCatalog =

        return compact('user', 'topLevelCategories', 'category', 'products', 'mostViewedChunk');
    }

    /**
     * @param $price
     * @param $percent
     * @return string
     */
    private function discount($price, $percent)
    {
        $discount_price = number_format($price - $price * $percent, 2);

        return $discount_price;
    }
}
