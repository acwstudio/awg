<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
use App\Product;
use App\Services\MyStore\ServiceInit;
use Illuminate\Http\Request;

/**
 * Class InitController
 *
 * @package App\Http\Controllers\MyStore
 */
class InitController extends Controller
{
    protected $init;

    /**
     * InitController constructor.
     *
     * @param ServiceInit $serviceInit
     */
    public function __construct(ServiceInit $serviceInit)
    {
        $this->init = $serviceInit;
    }

    /**
     * @return string
     */
    public function initCatalog()
    {
        //dd(Product::where('st_id', 'ttttttttt')->get());
        return $this->init->srvInitCatalog();
    }

    public function initWebhook()
    {
        return $this->init->srvInitWebhook();
    }
}
