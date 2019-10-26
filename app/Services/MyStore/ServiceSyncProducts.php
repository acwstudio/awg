<?php

namespace App\Services\MyStore;

use App\Http\Resources\ResourceProduct;

/**
 * Class ServiceSyncProducts
 *
 * @package App\Services\MyStore
 */
class ServiceSyncProducts extends ServiceMyStoreBase
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function srvGetProducts()
    {
        $itemsURL = config('api-store.url');
        $itemsURL['path'] = '/entity/product';
        $itemsURL['parameters'] = '?limit=100&expand=productFolder.productFolder';


        do {
            $products = $this->buildEndPoint($itemsURL);
            $itemsURL = key_exists('nextHref', $products['meta']) ? $products['meta']['nextHref'] : false;
            dump($products['meta']['offset']);
        } while ($itemsURL);

        $data = $products['rows'];
        dd($products['rows']);
//        foreach ($data as $key => $item) {
//
//            $category = ResourceCategory::make($item)->resolve();
//            //dump($category);
//            Category::insert($category);
//
//        }

//        $collection = Category::all();
//        $multiplied = $collection->map(function ($item, $key) use ($collection) {
//            if ($item->productFolder) {
//                /** @var Category $item */
//                $category_id = $collection->where('store_id', $item->productFolder)->first()->id;
//                $item->update(['category_id' => $category_id]);
//            }
//        });

        return 'ok';
    }
}