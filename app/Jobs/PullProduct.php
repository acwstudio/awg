<?php

namespace App\Jobs;

use App\Category;
use App\Http\Resources\Product as ResourceProduct;
use App\Http\Resources\ProductImage as ResourceProductImage;
use App\Product;
use App\Unit;
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
    public $retryAfter = 650;
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
        $shopUnits = Unit::all();
        $shopCategories = Category::all();

        do {

            $storeProducts = json_decode($client->get($this->itemsURL)->getBody()->getContents(), true);

            foreach ($storeProducts['rows'] as $key => $row) {

                $shopProduct = Product::where('st_id', $row['id'])->first();

                if (!isset($shopProduct)) {

                    $storeProduct = ResourceProduct::make($row)->resolve();

                    $shopUnit = $shopUnits->where('st_id', $storeProduct['st_uom_id'])->first();
                    $storeProduct['unit_id'] = isset($shopUnit->id) ? $shopUnit->id : null;

                    $shopCategory = $shopCategories->where('st_id', $storeProduct['st_category_id'])->first();
                    $storeProduct['category_id'] = isset($shopCategory->id) ? $shopCategory->id : null;

                    $product_id = Product::insertGetId($storeProduct);

                    if (isset($row['image'])) {

                        $storeProductImage = ResourceProductImage::make($row['image'])->resolve();
                        $storeProductImage['active'] = 1;
                        $storeProductImage['product_id'] = $product_id;
                        Product::find($product_id)
                            ->store_product_images()
                            ->insertGetId($storeProductImage);

                    }

                } else {

                    if ($shopProduct->st_version !== $row['version']) {

                        $storeProduct = ResourceProduct::make($row)->resolve();
                        dump($shopProduct->st_version);
                        $shopProduct->update($storeProduct);

                        if (isset($row['image'])) {

                            $image_href = explode('/', $row['image']['meta']['href']);
                            $last_key = array_key_last($image_href);
                            $image_id = $image_href[$last_key];

                            $images = $shopProduct->store_product_images();

                            $storeProductImage = ResourceProductImage::make($row['image'])->resolve();
                            $storeProductImage['active'] = 1;
                            $storeProductImage['product_id'] = $shopProduct->id;

                            /** @var Product $images */
                            if($images->get()->isEmpty()) {

                                $images->insertGetId($storeProductImage);
                                info($storeProductImage['st_href_download'] . '** newest image');

                            } else {

                                foreach ($images->get() as $item) {
                                    $item->update(['active' => 0]);
                                }

                                //$is_image = $images->where('st_id', $image_id)->get()->isNotEmpty();
                                $image = $images->where('st_id', $image_id)->first();

                                if ($image) {

                                        $image->update($storeProductImage);
                                        info($storeProductImage['st_href_download'] . '** update image');

                                } else {

                                    $images->insertGetId($storeProductImage);
                                    info($storeProductImage['st_href_download'] . '** just new image');

                                }
                            }
                        }
                    }
                }
            }
            dump($storeProducts['meta']['offset']);
            $this->itemsURL = isset($storeProducts['meta']['nextHref']) ? $storeProducts['meta']['nextHref'] : false;

        } while ($this->itemsURL);

    }

}
