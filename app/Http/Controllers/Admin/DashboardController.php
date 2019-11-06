<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ServiceAdminDashboard;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    protected $dashboard;

    /**
     * DashboardController constructor.
     *
     * @param \Redis $redis
     */
    public function __construct(ServiceAdminDashboard $adminDashboard)
    {
        $this->middleware('auth:admin');
        $this->dashboard = $adminDashboard;
    }

    /**
     * @return string
     */
    public function index()
    {
        $data = $this->dashboard->srvIndex();

        return view('admin.dashboard', $data);
    }

}
