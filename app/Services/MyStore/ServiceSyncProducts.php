<?php

namespace App\Services\MyStore;

use App\Category;
use App\Http\Resources\ResourceProduct;
use App\Product;
use Illuminate\Support\Facades\Redis;
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

            Redis::set('offset', 0);

            do {
                $products = json_decode($this->buildEndPoint($itemsURL), true);
                $data = collect($products['rows']);

                foreach ($data as $key => $item) {

                    $product = ResourceProduct::make($item)->resolve();

                    if ($product['product_folder']) {
                        $category_id = Category::where('store_id', $product['product_folder'])->first()->id;
                    } else {
                        $category_id = $product['category_id'];
                    }

                    $product['category_id'] = $category_id;

                    Product::insert($product);

                }
                $itemsURL = key_exists('nextHref', $products['meta']) ? $products['meta']['nextHref'] : false;
                //dump($products['meta']['offset']);
                $size = $products['meta']['size'];
                Redis::set('offset', $products['meta']['offset']);
                Redis::set('size', $size);

            } while ($itemsURL);

            Redis::set('offset', $size);

            $result = 'каталог загружен';

        } else {
            $result = 'каталог загружен';
        }

        return $result;
    }
}