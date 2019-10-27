<?php

namespace App\Services\MyStore;


/**
 * Class ServiceSyncImages
 *
 * @package App\Services\MyStore
 */
class ServiceSyncImages extends ServiceMyStoreBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function srvGetImages()
    {
        return 'ok';
    }
}