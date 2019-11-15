<?php


namespace App\Services\MyStore;

use App\Http\Resources\ResourceWebHook;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Redis;

/**
 * Class ServiceWebhook
 *
 * @package App\Services\MyStore
 */
class ServiceWebhook
{
    protected $client;
    protected $redis;

    /**
     * ServiceWebhook constructor.
     *
     * @param Client $client
     * @param Redis $redis
     */
    public function __construct(Client $client, Redis $redis)
    {
        $this->redis = $redis;
        $this->client = $client;
    }

    /**
     * @param $data
     * @return int
     */
    public function srvHandle($data)
    {
        $webhook = ResourceWebHook::make($data)->resolve();

        /** @var string $webhook */
        Log::info($webhook);

        $status = 200;

        return $status;
    }

    public function srvCreate()
    {
        $entities = config('api-store.entities');
        $actions = config('api-store.actions');
        $itemsURL = config('api-store.guzzlehttp.base_uri')
            . '/entity/webhook';

        foreach ($entities as $entity) {
            foreach ($actions as $action) {
                try {
                    $result = $this->client->post($itemsURL,
                        ['body' => json_encode([
                            'url' => 'https://43ab93f9.ngrok.io/mystore/webhook-handler',
                            'action' => $action,
                            'entityType' => $entity
                        ])])->getBody()->getContents();
                } catch (\Exception  $ex) {
//            $result = $ex->getMessage();
                    $result = $ex->getCode();
                }
            }

            return $result;

        }

    }

}