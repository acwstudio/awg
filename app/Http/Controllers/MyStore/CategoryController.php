<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
use App\Services\MyStore\ServiceSyncCategories;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\MyStore
 */
class CategoryController extends Controller
{
    protected $categories;

    /**
     * CategoryController constructor.
     *
     * @param ServiceSyncCategories $categories
     */
    public function __construct(ServiceSyncCategories $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function syncProductsCategory()
    {
        return $this->categories->srvGetCategories();
    }
}
