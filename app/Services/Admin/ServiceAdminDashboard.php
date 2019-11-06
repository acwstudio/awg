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
        $this->redis->set('api:products:offset', $amtPositions);
        $amtCategories = Category::all()->count();
        $this->redis->set('api:categories:offset', $amtCategories);
        $amtImages = Product::where('img_name', '!=', null)->count();

        $data = compact('amtPositions', 'amtCategories', 'amtImages');

        return $data;
    }

}