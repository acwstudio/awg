<?php

namespace App\Services\MyStore;

use App\Category;
use App\Http\Resources\ResourceCategory;

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
        $itemsURL = config('api-store.url');
        $itemsURL['path'] = '/entity/productfolder';
        $itemsURL['parameters'] = '?expand=productFolder&limit=100';

        $folders = json_decode($this->buildEndPoint($itemsURL), true);

        $data = $folders['rows'];

        foreach ($data as $key => $item) {

            $category = ResourceCategory::make($item)->resolve();

            if (!Category::all()->contains('store_id', $item['id'])) {
                Category::insert($category);
            }
        }

        $collection = Category::all();
        $multiplied = $collection->map(function ($item, $key) use ($collection) {
            if ($item->product_folder) {
                /** @var Category $item */
                $category_id = $collection->where('store_id', $item->product_folder)->first()->id;
                $item->update(['category_id' => $category_id]);
            }
        });

        return 'ok';
    }
}