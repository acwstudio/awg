<?php

namespace App\Services\API;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

/**
 * Class ApiService
 *
 * @package App\Services\API
 */
abstract class ApiService
{
    protected $baseUrl;
    protected $token;
    protected $client;
    protected $totalProducts;

    protected $cnfUrl;

    /**
     * ApiService constructor.
     *
     * @param Client $client
     */
    protected function __construct()
    {
        $this->cnfUrl = config('api-store.url');

        $this->token = config('api-store.token');

        $this->client = new Client();
    }

    /**
     * @param String $uri
     * @return Collection $jsonData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getEndpointAPI(string $endUrl)
    {
        $jsonData = json_decode($this->client->request(
            'get', $endUrl,
            ['headers' => [
                'Authorization'=>$this->token,
            ]]
        )->getBody()->getContents());

        //$this->totalProducts = $jsonData->meta->size;

        return $jsonData;
    }

    /**
     * @param array $url
     * @return string
     */
    protected function endpointBuilder(array $url)
    {
        //dd(implode(array_merge($this->cnfUrl, $url)));
        return implode(array_merge($this->cnfUrl, $url));
    }
}