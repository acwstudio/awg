<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
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
     * @return array
     */
    public function initCategory()
    {
        return $this->init->srvInitCategory();
    }

    /**
     * @return array
     */
    public function initProduct()
    {
        return $this->init->srvInitProduct();
    }

    public function initProductImage()
    {
        return $this->init->srvInitProductImage();
    }

    public function initWebhook()
    {
        return $this->init->srvInitWebhook();
    }
}
