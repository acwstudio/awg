<?php

namespace App\Services\MyStore;

use App\Category;
use App\Jobs\PrepareArray;
use App\Jobs\PullCategory;
use App\Jobs\PullProduct;
use App\Jobs\PullProductImage;
use App\Jobs\PullUnit;
use App\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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
     * @throws GuzzleException
     */
    public function srvInitCatalog()
    {
        //dd(Category::find(53)->products);
        $types = config('api-store.types');

        $urlProduct = $this->client->getConfig()['base_uri']
            . $types['assortment']
            . '?expand=productFolder, uom'
            . '&filter=type=product';

        $urlCategory = $this->client->getConfig()['base_uri']
            . $types['productfolder']
            . '?expand=productFolder';

        $urlUnit = $this->client->getConfig()['base_uri']
            . $types['unit'];

        $category = 'App\Category';
        $unit = 'App\Unit';
        $product = 'App\Product';

        PullProduct::withChain([
            new PullCategory($urlCategory, $category),
            new PullUnit($urlUnit, $unit),
        ])->dispatch($urlProduct, $product);

        return 'ok';
    }

    public function srvInitWebhook()
    {
        return 'Webhooks';
    }
}
