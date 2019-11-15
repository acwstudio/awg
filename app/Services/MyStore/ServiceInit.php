<?php


namespace App\Services\MyStore;
use App\Category;
use App\Http\Resources\ResourceCategory;
use App\Http\Resources\ResourceProduct;
use App\Jobs\InitProductImagesJob;
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
     * Get categories from My Store to db
     *
     * @return array
     */
    public function srvInitCategory()
    {
        $categories = Category::all();
        $size = $categories->count();
        //$this->redis->hMSet('init:category', ['size' => 0, 'offset' => 0]);

        if ($size === 0) {

            $itemsURL = config('api-store.guzzlehttp.base_uri')
                . '/entity/productfolder' . '?expand=productFolder&limit=10';

            do {
                $apiCategories = json_decode($this->client->get($itemsURL)->getBody()->getContents());

                foreach ($apiCategories->rows as $key => $item) {

                    $category = ResourceCategory::make($item)->resolve();
                    Category::insert($category);

                }

                $itemsURL = isset($apiCategories->meta->nextHref) ? $apiCategories->meta->nextHref : false;
                //dump($apiCategories->meta->nextHref);
                $this->redis->hMSet('init:category', [
                    'size' => $apiCategories->meta->size,
                    'offset' => $apiCategories->meta->offset,
                ]);

            } while ($itemsURL);

            $categories = Category::all();

            $categories->map(function ($item, $key) use ($categories) {
                if ($item->product_folder) {
                    /** @var Category $item */
                    $category_id = $categories->where('store_id', $item->product_folder)->first()->id;
                    $item->update(['category_id' => $category_id]);
                }


            });

            $size = $categories->count();
            $this->redis->hMSet('init:category', ['size' => $size, 'offset' => $size]);
            $result = ['message' => 'категории загружены', 'offset' => $size];

        } else {

            $this->redis->hMSet('init:category', ['size' => $size, 'offset' => $size]);
            $result = ['message' => 'категории загружены', 'offset' => $size];

        }
        $this->redis->hMSet('init:category', ['size' => 0, 'offset' => 0]);
        return $result;
    }

    /**
     * Get products from My Store to db
     *
     * @return array
     */
    public function srvInitProduct()
    {
        $this->redis->hMSet('init:product', ['size' => 0, 'offset' => 0]);
        $products = Product::all();
        $size = $products->count();

        if ($products->count() === 0) {

            $itemsURL = config('api-store.guzzlehttp.base_uri')
                . '/entity/product' . '?limit=100&expand=productFolder,uom';

            do {
                $apiProducts = json_decode($this->client->get($itemsURL)->getBody()->getContents());

                foreach ($apiProducts->rows as $key => $item) {

                    $product = ResourceProduct::make($item)->resolve();

                    if ($product['product_folder']) {
                        $category_id = Category::where('store_id', $product['product_folder'])->first()->id;
                    } else {
                        $category_id = $product['category_id'];
                    }

                    $product['category_id'] = $category_id;

                    Product::insert($product);

                }
                $itemsURL = isset($apiProducts->meta->nextHref) ? $apiProducts->meta->nextHref : false;

                $this->redis->hMSet('init:product', [
                    'size' => $apiProducts->meta->size,
                    'offset' => $apiProducts->meta->offset,
                ]);

            } while ($itemsURL);

            $products = Product::all();

            $size = $products->count();
            $this->redis->hMSet('init:product', ['size' => $size, 'offset' => $size]);
            $result = ['message' => 'товары загружены', 'offset' => $size];

        } else {

            $this->redis->hMSet('init:product', ['size' => $size, 'offset' => $size]);
            $result = ['message' => 'товары загружены', 'offset' => $size];

        }
        $this->redis->hMSet('init:product', ['size' => 0, 'offset' => 0]);
        return $result;

    }

    /**
     * @return array
     */
    public function srvInitProductImage()
    {
        $images = Product::where('store_image', '!=', '')->get();
        $this->redis->hMSet('init:image', ['size' => $images->count()]);
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