<?php


namespace App\Services\Admin;

use App\Category;
use App\Product;

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
     * @param \Redis $redis
     */
    public function __construct(\Redis $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @return array
     */
    public function srvIndex()
    {
        $amtPositions = Product::all()->count();
        $this->redis->hSet('init:product', 'offset', $amtPositions);
        $amtCategories = Category::all()->count();
        $this->redis->hSet('init:category', 'offset', $amtCategories);
        $amtImages = Product::where('img_name', '!=', null)->count();
        $this->redis->hSet('init:image', 'offset', $amtImages);
        $data = compact('amtPositions', 'amtCategories', 'amtImages');

        return $data;
    }

}