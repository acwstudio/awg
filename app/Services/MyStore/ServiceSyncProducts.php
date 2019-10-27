<?php

namespace App\Services\MyStore;

use App\Category;
use App\Http\Resources\ResourceProduct;
use App\Product;
use Storage;

/**
 * Class ServiceSyncProducts
 *
 * @package App\Services\MyStore
 */
class ServiceSyncProducts extends ServiceMyStoreBase
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function srvGetProducts()
    {
        if (count(Product::all()) === 0) {

            $itemsURL = config('api-store.url');
            $itemsURL['path'] = '/entity/product';
            $itemsURL['parameters'] = '?limit=100&expand=productFolder,uom';

            do {
                $products = $this->buildEndPoint($itemsURL);
                $data = collect($products['rows']);

                foreach ($data as $key => $item) {

                    $product = ResourceProduct::make($item)->resolve();

                    if ($product['product_folder']) {
                        $category_id = Category::where('store_id', $product['product_folder'])->first()->id;
                    } else {
                        $category_id = $product['category_id'];
                    }

                    $product['category_id'] = $category_id;
                    //dd($product);
                    Product::insert($product);

                }
                $itemsURL = key_exists('nextHref', $products['meta']) ? $products['meta']['nextHref'] : false;
                dump($products['meta']['offset']);

            } while ($itemsURL);
        }
        //Storage::download($path);
        return 'ok';
    }
}