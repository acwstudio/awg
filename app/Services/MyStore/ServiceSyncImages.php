<?php

namespace App\Services\MyStore;

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

    public function __construct(Client $client, Redis $redis)
    {
        $this->redis = $redis;
        $this->client = $client;
    }

    /**
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function srvGetImages()
    {
        dd(Product::find(43)->product_images);
        $itemsURL = config('api-store.guzzlehttp.base_uri');

        $productsHasImage = Product::where('store_image', '!=', '')->whereNull('img_name')->get();
        //dd($productsHasImage->count());
        foreach ($productsHasImage as $key => $item) {

            $itemsURL['path'] = '/download/' . $item->store_image;
            $itemsURL['parameters'] = '';

            $img_name = 'product-' . $item->id . '-' . $item->code;

            Product::find($item->id)->update([
                'img_name' => $img_name,
                'img_extension' => '.jpg',
            ]);

            $image = $this->buildEndPoint($itemsURL);

            Storage::disk('public')->put($img_name . '.jpg', $image);

            $img = Image::load(storage_path('app/public/' . $img_name . '.jpg'));
            $img->fit(Manipulations::FIT_FILL, 400, 400)
                ->background('bebcc1')->save();
//            dd($img->getWidth());
            //dump($key);
        }

        return 'ok';
    }
}
