<?php

namespace App\Http\Controllers\MyStore;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Services\MyStore\ServiceInit;
use DB;
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
        //dd(Product::find(33)->store_product_images->where('active', true)->first());
//        $arr = explode('/', "https://online.moysklad.ru/api/remap/1.1/download/7fa96d85-63c2-4622-8e7d-8bb4000be01c");
//        $last_key = array_key_last($arr);
//        dd($arr[$last_key]);
        //dd(Category::skip(10)->take(10)->get());
        return $this->init->srvInitCatalog();
    }

    public function initWebhook()
    {
        return $this->init->srvInitWebhook();
    }
}
