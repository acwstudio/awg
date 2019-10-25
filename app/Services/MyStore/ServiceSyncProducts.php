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
        $itemsURL['path'] = '/entity/product/001f2b51-eefb-11e8-9107-50480003dc02';
        $itemsURL['parameters'] = '?limit=10&expand=productFolder.productFolder';

        return ResourceProduct::make($this->buildEndPoint($itemsURL))->resolve();
    }
}