<?php


namespace App\Services\Shop;

use App\Category;
use App\Product;
use Auth;
use Illuminate\Support\Str;

/**
 * Class ServiceShopHome
 *
 * @package App\Services\Shop
 */
class ServiceShopHome
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

        foreach ($productsTotal as $item) {
            $item->img_full_name = $item->img_name ? $item->img_name . $item->img_extension : 'product_empty.png';
        }

        $productsTrend = $productsTotal->whereBetween('id', [2978, 2998]);
        $productsHot = $productsTotal->random(3);
        foreach ($productsHot as $item) {
            $item->discount_price = $this->discount($item->price, 0.1);
            $item->percent = 10;
        }

        $mostViewed = $productsTotal->random(4);
        foreach ($mostViewed as $item) {
            $item->discount_price = $this->discount($item->price, 0.2);
            $item->percent = 20;
            $item->sub_name = $item->name ? Str::limit($item->name, 20) : Str::limit('товар без названия', 0, 20);
        }

        $productSpecOffer = $productsTotal->random(1);
        foreach ($productSpecOffer as $item) {
            $item->discount_price = $this->discount($item->price, 0.3);
            $item->percent = 30;
            $item->sub_name = $item->name ? Str::limit($item->name, 20) : Str::limit('товар без названия', 0, 20);
        }

        $newProducts = $productsTotal->random(12);

        foreach ($newProducts as $item) {
            $item->discount_price = $this->discount($item->price, 0.3);
            $item->percent = 30;
            $item->sub_name = $item->name ? Str::limit($item->name, 20) : Str::limit('товар без названия', 0, 20);
        }

        $newProducts->each(function ($item, $key) {
            //
        });

//        for ($i=0; $i < $newProducts->count(); $i++) {
//            $newCollection =
//        }


        return compact(
            'user', 'categories', 'topLevelCategories', 'productsTrend', 'productsHot', 'productSpecOffer',
            'mostViewed', 'newProducts'
            );
    }

    /**
     * @param $id
     * @return array
     */
    public function srvShopShow($id)
    {
        $topLevelCategories = Category::where('category_id', '=', null)->with('children')->get();
        $product = Product::find($id);
        $product->img_full_name = $product->img_name ?
            $product->img_name . $product->img_extension : 'product_empty.png';

        return compact('topLevelCategories', 'product');
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