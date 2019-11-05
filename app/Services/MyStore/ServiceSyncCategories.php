<?php

namespace App\Services\MyStore;

use App\Category;
use App\Http\Resources\ResourceCategory;
use GuzzleHttp\Client;
use Redis;

/**
 * Class ServiceSyncCategories
 *
 * @package App\Services\MyStore
 */
class ServiceSyncCategories
{
    protected $client;
    protected $redis;

    /**
     * ServiceSyncCategories constructor.
     *
     * @param Client $client
     * @param Redis $redis
     */
    public function __construct(Client $client, Redis $redis)
    {
        $this->client = $client;
        $this->redis = $redis;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function srvGetCategories()
    {
        $categories = Category::all();
        $this->redis->set('api:categories:size', $categories->count());

        if ($categories->count() === 0) {

            $itemsURL = config('api-store.guzzlehttp.base_uri')
                . '/entity/productfolder' . '?expand=productFolder&limit=100';

            $this->redis->set('api:categories:offset', 0);

            do {
                $apiCategories = json_decode($this->client->get($itemsURL)->getBody()->getContents());

                foreach ($apiCategories->rows as $key => $item) {

                    $category = ResourceCategory::make($item)->resolve();
                    Category::insert($category);

                }

                $itemsURL = isset($apiCategories->meta->nextHref) ? $apiCategories->meta->nextHref : false;
                $this->redis->set('api:categories:offset', $apiCategories->meta->offset);
                $this->redis->set('api:categories:size', $apiCategories->meta->size);

            } while ($itemsURL);

            $categories = Category::all();

            $categories->map(function ($item, $key) use ($categories) {
                if ($item->product_folder) {
                    /** @var Category $item */
                    $category_id = $categories->where('store_id', $item->product_folder)->first()->id;
                    $item->update(['category_id' => $category_id]);
                }
            });

            $this->redis->set('api:categories:offset', $apiCategories->meta->size);

            $result = ['message' => 'категории загружены', 'offset' => $categories->count()];

        } else {

            $result = ['message' => 'категории загружены', 'offset' => $categories->count()];

        }

        return $result;

    }
}
