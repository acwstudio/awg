<?php

namespace App\Services\MyStore;

use App\Jobs\SyncImages;
use App\Product;
use App\ProductImage;
use GuzzleHttp\Client;
use Redis;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Storage;

/**
 * Class ServiceSyncImages
 *
 * @package App\Services\MyStore
 */
class ServiceSyncImages
{
    protected $client;
    protected $redis;

    /**
     * ServiceSyncImages constructor.
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
     * @return array
     */
    public function srvGetImages()
    {
        $images = Product::where('store_image', '!=', '')->get();
        $this->redis->set('api:images:size', $images->count());
//        $hasImagestore = Product::where('store_image', '!=', '')->whereNull('img_name')->get();
        $hasImagestore = Product::where('store_image', '!=', '')->get();
//        dd($hasImagestore->count());

        foreach ($hasImagestore as $key => $item) {

            if (count($item->product_images) === 0) {

                $itemsURL = $item->store_image;

                $img_name = 'product-' . $item->id . '-' . $item->code;
                $data = [
                    'url' => $itemsURL,
                    'img_name' => $img_name,
                    'number' => $key
                ];
                Product::find($item->id)->update([
                    'img_name' => $img_name,
                    'img_extension' => '.jpg',
                ]);
                // Queue processing images
                SyncImages::dispatch($data);
            }

        }

        return ['message' => 'изображения загружены', 'offset' => $this->redis->get('api:images:offset')];
    }
}
