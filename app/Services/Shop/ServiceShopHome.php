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
        $topLevelCategories = Category::where('category_id', '=', null)->with('children')->get();

        $productsTotal = Product::where('st_stock', '>', 0)->get();
//        dd($productsTotal->get());

        /** @var Product $item */
        foreach ($productsTotal as $item) {
            $img_full_name = $item->store_product_images()->where('active', 1)->first();
            $item->img_full_name = $img_full_name ?
                $img_full_name->img_name . '.' . $img_full_name->img_ext : 'product_empty.png';
        }

        $productsTrend = $productsTotal->random(15);
        foreach ($productsTrend as $item) {
            $item->discount_price = $this->discount($item->st_sale_price, 0.1);
            $item->percent = 10;
        }

        $productsHot = $productsTotal->random(3);
        foreach ($productsHot as $item) {
            $item->discount_price = $this->discount($item->st_sale_price, 0.1);
            $item->percent = 10;
        }

        $mostViewed = $productsTotal->random(12);
        foreach ($mostViewed as $item) {
            $item->discount_price = $this->discount($item->st_sale_price, 0.2);
            $item->percent = 20;
            $item->sub_name = $item->st_name ? Str::limit($item->st_name, 20) : Str::limit('товар без названия', 0, 20);
        }
        $mostViewedChunk = $mostViewed->chunk(4);

        $productSpecOffer = $productsTotal->random(1);
        foreach ($productSpecOffer as $item) {
            $item->discount_price = $this->discount($item->st_sale_price, 0.3);
            $item->percent = 30;
            $item->sub_name = $item->st_name ? Str::limit($item->st_name, 20) : Str::limit('товар без названия', 0, 20);
        }

        $newProducts = $productsTotal->random(12);
        foreach ($newProducts as $item) {
            $item->discount_price = $this->discount($item->st_sale_price, 0.1);
            $item->percent = 10;
            $item->sub_name = $item->st_name ? Str::limit($item->st_name, 20) : Str::limit('товар без названия', 0, 20);
        }
        $newProductsChunk = $newProducts->chunk(2);

        return compact(
            'user', 'categories', 'topLevelCategories', 'productsTrend', 'productsHot', 'productSpecOffer',
            'mostViewedChunk', 'newProductsChunk'
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
