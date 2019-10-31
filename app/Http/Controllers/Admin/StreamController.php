<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Class StreamController
 *
 * @package App\Http\Controllers\Admin
 */
class StreamController extends Controller
{
    /**
     * @return mixed
     */
    public function getEventStream()
    {
        $message = Redis::get('offset') / Redis::get('size') * 100;
        $data = [
            'message' => (integer)$message,
            'size' => Redis::get('size'),
            'offset' => Redis::get('offset')
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
