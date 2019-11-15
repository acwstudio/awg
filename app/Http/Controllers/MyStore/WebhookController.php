<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
use App\Services\MyStore\ServiceWebhook;

/**
 * Class WebhookController
 *
 * @package App\Http\Controllers\MyStore
 */
class WebhookController extends Controller
{
    protected $webhook;

    /**
     * WebhookController constructor.
     *
     * @param ServiceWebhook $webhook
     */
    public function __construct(ServiceWebhook $webhook)
    {
        $this->webhook = $webhook;
    }

    /**
     *
     * @return \Exception|\Illuminate\Http\JsonResponse|string
     */
    public function createWebhook()
    {
        $result = $this->webhook->srvCreate();

        return $result;
//        return response()->json($result);
    }

}
