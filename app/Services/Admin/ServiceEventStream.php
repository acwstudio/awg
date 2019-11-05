<?php

namespace App\Services\Admin;

use Redis;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Class ServiceEventStream
 *
 * @package App\Services\Admin+
 */
class ServiceEventStream
{
    protected $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function srvEventStream($entity)
    {
        if ($entity === "category") {
            $message = $this->redis->get('api:categories:offset') / $this->redis->get('api:categories:size') * 100;

            $data = [
                $entity => [
                    'message' => (integer)$message,
                    'size' => $this->redis->get('api:categories:size'),
                    'offset' => $this->redis->get('api:categories:offset'),
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

        if ($entity === "product") {
            $message = $this->redis->get('api:products:offset') / $this->redis->get('api:products:size') * 100;

            $data = [
                $entity => [
                    'message' => (integer)$message,
                    'size' => $this->redis->get('api:products:size'),
                    'offset' => $this->redis->get('api:products:offset'),
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
    }
}
