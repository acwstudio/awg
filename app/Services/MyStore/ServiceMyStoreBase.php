<?php


namespace App\Services\MyStore;

use App\Http\Resources\ResourceProduct;
use GuzzleHttp\Client;

/**
 * Class ServiceMyStoreBase
 *
 * @package App\Services\MyStore
 */
class ServiceMyStoreBase
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->token = config('api-store.token');
        $this->client = new Client();
    }

    /**
     * @param $configURL
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function buildEndPoint($itemsURL)
    {
        $url = '';
        foreach ($itemsURL as $item) {
            $url = $url . $item;
        }

        $jsonData = json_decode($this->client->request(
            'get', $url,
            ['headers' => [
                'Authorization'=>$this->token,
            ]]
        )->getBody()->getContents(), true);

        return $jsonData;
    }
}