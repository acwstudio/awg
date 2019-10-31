<?php


namespace App\Services\MyStore;

use App\Http\Resources\ResourceProduct;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
use Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        $url = null;

        if(is_array($itemsURL)) {
            //dump('array');
            foreach ($itemsURL as $item) {
                $url = $url . $item;
            }
        } else {
            $url = $itemsURL;
        }

        $jsonData = $this->client->request(
            'get', $url,
            ['headers' => [
                'Authorization'=>$this->token,
            ]]
        )->getBody()->getContents();

        return $jsonData;
    }

}