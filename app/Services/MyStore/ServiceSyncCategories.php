<?php

namespace App\Services\MyStore;

use App\Category;
use App\Http\Resources\ResourceCategory;
use Illuminate\Support\Facades\Redis;

/**
 * Class ServiceSyncCategories
 *
 * @package App\Services\MyStore
 */
class ServiceSyncCategories extends ServiceMyStoreBase
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function srvGetCategories()
    {

        if (count(Category::all()) === 0) {

            $itemsURL = config('api-store.url');
            $itemsURL['path'] = '/entity/productfolder';
            $itemsURL['parameters'] = '?expand=productFolder&limit=100';

            Redis::set('offset', 0);

            do {
                $categories = json_decode($this->buildEndPoint($itemsURL), true);
                $data = collect($categories['rows']);

                foreach ($data as $key => $item) {

                    $category = ResourceCategory::make($item)->resolve();

                    if (!Category::all()->contains('store_id', $item['id'])) {
                        Category::insert($category);
                    }

                    $collection = Category::all();
                    $multiplied = $collection->map(function ($item, $key) use ($collection) {
                        if ($item->product_folder) {
                            /** @var Category $item */
                            $category_id = $collection->where('store_id', $item->product_folder)->first()->id;
                            $item->update(['category_id' => $category_id]);
                        }
                    });

                }
                $itemsURL = key_exists('nextHref', $categories['meta']) ? $categories['meta']['nextHref'] : false;

                $size = $categories['meta']['size'];
                Redis::set('offset', $categories['meta']['offset']);
                Redis::set('size', $size);

            } while ($itemsURL);

            Redis::set('offset', $size);

            $result = 'категории загружены';

        } else {
            $result = 'категории загружены';
        }

        return $result;

    }
}