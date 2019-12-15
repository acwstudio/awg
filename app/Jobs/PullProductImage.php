<?php

namespace App\Jobs;

use App\Product;
use App\StoreProductImage;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Storage;

/**
 * Class PullProductImage
 * @package App\Jobs
 */
class PullProductImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 1500;
    public $retryAfter = 1560;
    private $itemsURL;

    /**
     * Create a new job instance.
     *
     * @param string $itemsURL
     */
    public function __construct(string $itemsURL)
    {
        $this->itemsURL = $itemsURL;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function handle(Client $client)
    {
//        $shopProducts =
        $shopProducts = Product::whereNotNull('st_image_href');
        //dump($shopProducts->get()->count());
        foreach ($shopProducts->get() as $shopProduct) {

            /** @var Product $shopProduct */
            $images = $shopProduct->store_product_images();

                foreach ($images->get() as $image) {

                    $imgNameExplode = explode('.', $image->st_file_name);
                    $lastKey = array_key_last($imgNameExplode);

                    $imgName = 'product-' . $shopProduct->id . '-' . $shopProduct->st_code . '-image-' . $image->id;
                    $imgExt = $imgNameExplode[$lastKey];

                    $image->update([
                        'img_name' => $imgName,
                        'img_ext' => $imgExt
                    ]);

                    $storeImage = $client->get($image->st_href_download)->getBody()->getContents();

                    Storage::disk('public')->put('/store/' . $imgName . '.' . $imgExt, $storeImage);
                    $img = Image::load(storage_path('app/public/store/' . $imgName . '.' . $imgExt));
                    $img->fit(Manipulations::FIT_FILL, 400, 400)->background('bebcc1')->save();
                }

        }
    }
}
