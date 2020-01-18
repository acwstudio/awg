<?php


namespace App\Services\Admin;

use App\Category;
use App\Product;
use Redis;

/**
 * Class ServiceAdminDashboard
 *
 * @package App\Services\Admin
 */
class ServiceAdminDashboard
{
    protected $redis;

    /**
     * DashboardController constructor.
     *
     * @param Redis $redis
     */
    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @return array
     */
    public function srvIndex()
    {
        $this->redis->set('test', 'price');
       // $this->redis->set('test', 'redis');

        $amtPositions = Product::all()->count();
        //$this->redis->hSet('init:product', 'offset', $amtPositions);
        $amtCategories = Category::all()->count();
        //$this->redis->hSet('init:category', 'offset', $amtCategories);
//        $amtImages = Product::where('st_image_href', '!=', null)->count();
        $amtImages = 0;
        //$this->redis->hSet('init:image', 'offset', $amtImages);
        $data = compact('amtPositions', 'amtCategories', 'amtImages');

        return $data;
    }

}
