<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Class ServiceEventStream
 *
 * @package App\Services\Admin
 */
class ServiceEventStream
{
    public function __construct()
    {

    }

    public function srvEventStream($entity)
    {
        Redis::set('offset', 55);
        $size = Redis::get('size');
        $offset = Redis::get($entity . '.offset');
        dd($size);
        $message = Redis::get('offset') / Redis::get('size') * 100;

        $data = [
            $entity => [
                'message' => (integer)$message,
                'size' => Redis::get('size'),
                'offset' => Redis::get('offset'),
                'entity' => $entity
            ]
        ];

        $response = new StreamedResponse();

        $response->setCallback(function () use ($data){

            echo 'data: ' . json_encode($data) . "\n\n";

            ob_flush();
            flush();

            usleep(20000);
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        $response->send();
    }

    public function srvEventStreamCatalog($entity)
    {
        return 'ok';
    }

    public function srvEventStreamCategory($entity)
    {
        return 'ok';
    }

    public function srvEventStreamImage($entity)
    {
        return 'ok';
    }

    private function sendResponse()
    {

    }
}