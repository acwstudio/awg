<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Services\Shop\ServiceShopCatalog;
use Illuminate\Http\Request;

/**
 * Class CatalogController
 *
 * @package App\Http\Controllers\Shop
 */
class CatalogController extends Controller
{
    protected $srvShopCatalog;

    /**
     * CatalogController constructor.
     *
     * @param ServiceShopCatalog $shopCatalog
     */
    public function __construct(ServiceShopCatalog $shopCatalog)
    {
        $this->srvShopCatalog = $shopCatalog;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($category_id = '')
    {
        $result = $this->srvShopCatalog->srvCatalogIndex($category_id);
//        dd($category_id);
        return view('shop.catalog.catalog', $result);
    }
}
