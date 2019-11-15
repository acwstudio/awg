<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
use App\Services\MyStore\ServiceWebhook;
use Illuminate\Http\Request;
use Log;

/**
 * Class WebhookHandlerController
 *
 * @package App\Http\Controller\MyStore
 */
class WebhookHandlerController extends Controller
{
    protected $webhook;

    /**
     * WebHookControllers constructor.
     *
     * @param ServiceWebhook $webHook
     */
    public function __construct(ServiceWebhook $webHook)
    {
        $this->webhook = $webHook;
    }

    /**
     * @return array
     */
    public function handle(Request $request)
    {
        $status = $this->webhook->srvHandle($request->all());
//        Log::info($request);
        return response()->json(['hello' => 'ok'], $status);
    }

//    public function show($data)
//    {
//        dd($data);
//        return $data;
//    }
}
