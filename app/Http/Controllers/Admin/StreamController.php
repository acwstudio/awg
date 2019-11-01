<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ServiceEventStream;
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
    protected $eventStream;

    /**
     * StreamController constructor.
     *
     * @param ServiceEventStream $eventStream
     */
    public function __construct(ServiceEventStream $eventStream)
    {
        $this->eventStream = $eventStream;
    }

    /**
     * @return mixed
     */
    public function getEventStream($entity)
    {
        $this->eventStream->srvEventStream($entity);
//        switch ($entity) {
//
//            case "catalog":
//                return $this->eventStream->srvEventStreamCatalog($entity);
//                break;
//
//            case "category":
//                return $this->eventStream->srvEventStreamCategory($entity);
//                break;
//
//            case "image":
//                return $this->eventStream->srvEventStreamImage($entity);
//                break;
//
//            default:
//                return 'no stream';
//        }


//        $message = Redis::get('offset') / Redis::get('size') * 100;
//        $data = [
//            'message' => (integer)$message,
//            'size' => Redis::get('size'),
//            'offset' => Redis::get('offset'),
//            'entity' => $entity
//        ];

//        $response = new StreamedResponse();
//
//        $response->setCallback(function () use ($data){
//
//            echo 'data: ' . json_encode($data) . "\n\n";
//
//            ob_flush();
//            flush();
//
//            usleep(20000);
//        });
//
//        $response->headers->set('Content-Type', 'text/event-stream');
//        $response->headers->set('X-Accel-Buffering', 'no');
//        $response->headers->set('Cach-Control', 'no-cache');
//        $response->send();

    }
}
