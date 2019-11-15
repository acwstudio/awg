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

    /**
     * ServiceEventStream constructor.
     *
     * @param Redis $redis
     */
    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @param $entity
     */
    public function srvEventStream($entity)
    {
        if ($entity === "category") {

            $params = [
                'entity' => $entity,
                'redis_h' => 'init:category',
                'redis_key_offset' => 'offset',
                'redis_key_size' => 'size',
                'message' => '',
                'usleep' => 20000,
            ];

            $this->streamResponse($params);

        }

        if ($entity === "product") {
            $params = [
                'entity' => $entity,
                'redis_h' => 'init:product',
                'redis_key_offset' => 'offset',
                'redis_key_size' => 'size',
                'message' => '',
                'usleep' => 20000,
            ];

            $this->streamResponse($params);
        }

        if ($entity === "image") {
            $params = [
                'entity' => $entity,
                'redis_h' => 'init:image',
                'redis_key_offset' => 'offset',
                'redis_key_size' => 'size',
                'message' => '',
                'usleep' => 20000,
            ];

            $this->streamResponse($params);
        }
    }

    /**
     * @param array $params
     */
    private function streamResponse(array $params)
    {
        $offset = $this->redis->hGet($params['redis_h'], $params['redis_key_offset']);
        $size = $this->redis->hGet($params['redis_h'], $params['redis_key_size']);

        if ($offset) {
            $message = $offset / $size * 100;
        } else {
            $message = 0;
        }

        $data = [
            $params['entity'] => [
                'message' => (integer)$message,
                'size' => $size,
                'offset' => $offset,
            ],
            'usleep' => 20000,
        ];

        $response = new StreamedResponse();

        $response->setCallback(function () use ($data){

            echo 'data: ' . json_encode($data) . "\n\n";

            ob_flush();
            flush();

            usleep($data['usleep']);
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        $response->send();
    }
}
