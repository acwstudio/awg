<?php

namespace App\Services\MyStore;

use App\Category;
use App\Http\Resources\ResourceProduct;
use App\Product;
use GuzzleHttp\Client;
use Redis;

/**
 * Class ServiceSyncProducts
 *
 * @package App\Services\MyStore
 */
class ServiceSyncProducts
{
    protected $client;
    protected $redis;

    /**
     * ServiceSyncProducts constructor.
     *
     * @param Client $client
     * @param Redis $redis
     */
    public function __construct(Client $client, Redis $redis)
    {
        $this->redis = $redis;
        $this->client = $client;
    }

    /**
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function srvGetProducts()
    {
        $products = Product::all();
        //$this->redis->set('api:products:size', $products->count());

        if ($products->count() === 0) {

            $itemsURL = config('api-store.guzzlehttp.base_uri')
                . '/entity/product' . '?limit=100&expand=productFolder,uom';

            $this->redis->set('api:products:offset', 0);

            do {
                $products = json_decode($this->client->get($itemsURL)->getBody()->getContents());

                foreach ($products->rows as $key => $item) {

                    $product = ResourceProduct::make($item)->resolve();

                    if ($product['product_folder']) {
                        $category_id = Category::where('store_id', $product['product_folder'])->first()->id;
                    } else {
                        $category_id = $product['category_id'];
                    }

                    $product['category_id'] = $category_id;

                    Product::insert($product);

                }
                $itemsURL = isset($products->meta->nextHref) ? $products->meta->nextHref : false;
               // dump($itemsURL);
                $size = $products->meta->size;
                $this->redis->set('api:products:offset', $products->meta->offset);
                $this->redis->set('api:products:size', $size);

            } while ($itemsURL);

            $this->redis->set('api:products:offset', Product::all()->count());

            $result = ['message' => 'каталог загружен', 'offset' => Product::all()->count()];

        } else {

            $result = ['message' => 'каталог загружен', 'offset' => Product::all()->count()];
        }

        return $result;
    }
}
