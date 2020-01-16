<?php

namespace App\Http\Controllers\Shop;

use App\Facades\GuzzleClient;
use App\Http\Controllers\Controller;
use App\Services\Shop\ServiceShopHome;
use Illuminate\Http\Request;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers\Shop
 */
class HomeController extends Controller
{
    protected $srvShopHome;

    /**
     * Create a new controller instance.
     *
     * @param ServiceShopHome $shopHome
     */
    public function __construct(ServiceShopHome $srvShopHome)
    {
        //$this->middleware('auth');
        $this->srvShopHome = $srvShopHome;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = $this->srvShopHome->srvShopIndex();

        return view('shop.home.home', $result);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $result = $this->srvShopHome->srvShopShow($id);

        return view('shop.product', $result);
    }

}
