<?php


namespace App\Services\MyStore;

use App\Http\Resources\ResourceWebHook;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Redis;

/**
 * Class ServiceWebHook
 *
 * @package App\Services\MyStore
 */
class ServiceWebHook
{
    protected $client;
    protected $redis;

    /**
     * ServiceWebHook constructor.
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

        Log::info($webhook);

        $status = 200;

        return $status;
    }

}