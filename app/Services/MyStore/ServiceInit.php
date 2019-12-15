<?php

namespace App\Services\MyStore;

use App\Jobs\PullCategory;
use App\Jobs\PullProduct;
use App\Jobs\PullProductImage;
use App\Jobs\PullUnit;
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
     * @return string
     */
    public function srvInitCatalog()
    {
        $urlProduct = config('api-store.guzzlehttp.base_uri')
            . '/entity/assortment' . '?filter=type=product&limit=100&expand=productFolder, uom';

        $urlCategory = config('api-store.guzzlehttp.base_uri')
            . '/entity/productfolder' . '?expand=productFolder&limit=25';

        $urlUnit = $itemsURL = config('api-store.guzzlehttp.base_uri')
            . '/entity/uom' . '?limit=25';

        PullUnit::withChain([
            new PullCategory($urlCategory),
            new PullProduct($urlProduct),
            new PullProductImage($urlProduct)
        ])->dispatch($urlUnit);

        return 'ok';
    }

    public function srvInitWebhook()
    {
        return 'Webhooks';
    }
}
