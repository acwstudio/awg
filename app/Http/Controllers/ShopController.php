<?php

namespace App\Http\Controllers;

use App\Category;
use App\Services\Shop\ServiceShopProducts;
use App\User;
use Auth;
use Illuminate\Http\Request;

/**
 * Class ShopController
 *
 * @package App\Http\Controllers
 */
class ShopController extends Controller
{
    protected $srvProducts;

    /**
     * Create a new controller instance.
     *
     * @param ServiceShopProducts $shopProducts
     */
    public function __construct(ServiceShopProducts $shopProducts)
    {
        //$this->middleware('auth');
        $this->srvProducts = $shopProducts;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = $this->srvProducts->srvShopIndex();

        return view('shop.home', $result);
    }
}
