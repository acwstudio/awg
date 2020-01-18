<?php

namespace App\Services\MyStore;

use App\Jobs\PrepareArray;
use App\Jobs\PullCategory;
use App\Jobs\PullProduct;
use App\Jobs\PullProductImage;
use App\Jobs\PullUnit;
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
        $types = config('api-store.types');

        $urlCategory = $this->client->getConfig()['base_uri']
            . $types['productfolder']
            . '?expand=productFolder';

        $urlUnit = $this->client->getConfig()['base_uri']
            . $types['unit'];

        $category = 'App\Category';
        $unit = 'App\Unit';

        //PrepareArray::dispatch($itemsURL, $model);

        PullUnit::withChain([
            new PullCategory($urlCategory, $category),
            //new PullProduct($urlProduct),
            //new PullProductImage($urlProduct)
        ])->dispatch($urlUnit, $unit);

        return 'ok';
    }

    /**
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    private function requestMyStore(array $params)
    {
        return $this->client->request($params['method'], $this->client->getConfig()['base_uri'] . $params['type'], [
            'query' => $params['query'],
            ]
        );
    }

    public function srvInitWebhook()
    {
        return 'Webhooks';
    }
}
