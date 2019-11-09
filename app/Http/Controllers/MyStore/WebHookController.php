<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
use App\Services\MyStore\ServiceWebHook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Log;

/**
 * Class WebHookController
 *
 * @package App\Http\Controllers\MyStore
 */
class WebHookController extends Controller
{
    protected $webhook;

    /**
     * WebHookController constructor.
     *
     * @param ServiceWebHook $webHook
     */
    public function __construct(ServiceWebHook $webHook)
    {
        $this->webhook = $webHook;
    }

    /**
     * @return array
     */
    public function handle(Request $request)
    {
        $status = $this->webhook->srvHandle($request);

        return response()->json(['hello' => 'ok'], $status);
    }

//    public function show($data)
//    {
//        dd($data);
//        return $data;
//    }
}
