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

        $folders = $this->buildEndPoint($itemsURL);
        //$total = $folders['meta']['size'];
        $data = $folders['rows'];

        foreach ($data as $key => $item) {

            $category = ResourceCategory::make($item)->resolve();
            //dump($category);
            //Category::insert($category);

        }

        $collection = Category::all();
        $multiplied = $collection->map(function ($item, $key) use ($collection) {
            if ($item->productFolder) {
                /** @var Category $item */
                $category_id = $collection->where('store_id', $item->productFolder)->first()->id;
                $item->update(['category_id' => $category_id]);
            }
        });

        return 'ok';
    }
}