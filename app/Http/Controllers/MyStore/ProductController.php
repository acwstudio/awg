<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
use App\Services\MyStore\ServiceSyncProducts;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 * @package App\Http\Controllers\MyStore
 */
class ProductController extends Controller
{

    protected $products;

    /**
     * ProductController constructor.
     *
     * @param ServiceSyncProducts $products
     */
    public function __construct(ServiceSyncProducts $products)
    {
        $this->products = $products;
    }

    /**
     * @return \Illuminate\Http\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function syncProductsCatalog()
    {
        return $this->products->srvGetProducts();
    }
}
