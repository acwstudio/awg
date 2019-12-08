<?php

namespace App\Services\MyStore;

use App\Jobs\InitProductImagesJob;
use App\Jobs\PullCategory;
use App\Jobs\PullProduct;
use App\Jobs\PullUnit;
use App\Product;
use GuzzleHttp\Client;
use Redis;

/**
 * Class ServiceInit
 *
 * @package App\Services\MyStore
 */
class ServiceInit
{
    protected $client;
    protected $redis;

    /**
     * ServiceInit constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client, Redis $redis)
    {
        $this->client = $client;
        $this->redis = $redis;
    }

    /**
     * @return string
     */
    public function srvInitCatalog()
    {
        $urlProduct = config('api-store.guzzlehttp.base_uri')
            . '/entity/assortment' . '?limit=100&expand=productFolder, uom';

        $urlCategory = config('api-store.guzzlehttp.base_uri')
            . '/entity/productfolder' . '?expand=productFolder&limit=25';

        $urlUnit = $itemsURL = config('api-store.guzzlehttp.base_uri')
            . '/entity/uom' . '?limit=25';

        PullUnit::withChain([
            new PullCategory($urlCategory),
            //new PullProduct($urlProduct)
        ])->dispatch($urlUnit);

        return 'ok';
    }

    /**
     * @return array
     */
    public function srvInitProductImage()
    {
        $hasImagestore = Product::where('store_img_url', '!=', '')->get();
        $this->redis->hMSet('init:image', ['size' => $hasImagestore->count()]);

        foreach ($hasImagestore as $key => $item) {

            $img_name_explode = explode('.', $item->store_img_name);
            $last_key = array_key_last($img_name_explode);
            //dd($img_name_explode[$last_key]);
            if (count($item->product_images) === 0) {

                //$itemsURL = $item->store_img_url;

                $img_name = 'product-' . $item->id . '-' . $item->code;
                $data = [
                    'url' => $item->store_img_url,
                    'img_name' => $img_name,
                    'number' => $key,
                    'img_extension' => $img_name_explode[$last_key],
                ];
                /** @var Product $item */
//                $item->product_images()->create([
//                    'img_name' => $img_name,
//                    'img_extension' => '.jpg',
//                ]);
                Product::find($item->id)->update([
                    'img_name' => $img_name,
                    'img_extension' => $img_name_explode[$last_key],
                ]);
                // Queue processing images
                InitProductImagesJob::dispatch($data);
            }

        }

        return ['message' => 'изображения загружены', 'offset' => $this->redis->hGet('init:image', 'offset')];
    }

    public function srvInitWebhook()
    {
        return 'Webhooks';
    }
}
