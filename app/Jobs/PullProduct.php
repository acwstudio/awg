<?php

namespace App\Jobs;

use App\Http\Resources\Product as ResourceProduct;
use App\Http\Resources\ProductImage as ResourceProductImage;
use App\Product;
use App\StoreProductImage;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class PullProduct
 * @package App\Jobs
 */
class PullProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 600;
    private $itemsURL;
    private $client;

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
     * @param Client $client
     * @return void
     */
    public function handle(Client $client)
    {
        $shProducts = Product::all();

        do {
            $stProducts = json_decode($client->get($this->itemsURL)->getBody()->getContents(), true);
            dump($stProducts['meta']['offset'] . ' Products');

            foreach ($stProducts['rows'] as $item) {
                if ($item['meta']['type'] === 'product') {

                    $stProduct = ResourceProduct::make($item)->resolve();

                    $shProduct = $shProducts->where('st_id', $stProduct['st_id']);

                    $this->addProduct($shProduct, $stProduct, $item);

                }
            }

            $this->itemsURL = isset($stProducts['meta']['nextHref']) ? $stProducts['meta']['nextHref'] : false;

        } while ($this->itemsURL);
    }

    /**
     * @param $shProduct
     * @param $stProduct
     * @param $item
     */
    private function addProduct($shProduct, $stProduct, $item)
    {
        /** @var $shProduct Product */
        if ($shProduct->count()) {

            $shProduct->first()->update($stProduct);

        } else {

            $product_id = Product::insertGetId($stProduct);

            if (isset($item['image'])) {

                $stProductImage = ResourceProductImage::make($item['image'])->resolve();
                $store_product_image_id = StoreProductImage::insertGetId($stProductImage);

                StoreProductImage::find($store_product_image_id)->update([
                    'product_id' => $product_id
                ]);

            }

        }
    }
}
