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
                'redis_key_offset' => 'api:categories:offset',
                'redis_key_size' => 'api:categories:size',
                'message' => '',
            ];

            $this->streamResponse($params);

        }

        if ($entity === "product") {
            $params = [
                'entity' => $entity,
                'redis_key_offset' => 'api:products:offset',
                'redis_key_size' => 'api:products:size',
                'message' => '',
            ];

            $this->streamResponse($params);
        }

        if ($entity === "image") {
            $params = [
                'entity' => $entity,
                'redis_key_offset' => 'api:images:offset',
                'redis_key_size' => 'api:images:size',
                'message' => '',
            ];

            $this->streamResponse($params);
        }
    }

    /**
     * @param array $params
     */
    private function streamResponse(array $params)
    {
        if ($params['redis_key_offset']) {
            $message = $this->redis
                    ->get($params['redis_key_offset']) / $this->redis->get($params['redis_key_size']) * 100;
        } else {
            $message = 0;
        }

        $data = [
            $params['entity'] => [
                'message' => (integer)$message,
                'size' => $this->redis->get($params['redis_key_size']),
                'offset' => $this->redis->get($params['redis_key_offset']),
                'entity' => $params['entity']
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
