<?php

namespace App\Http\Controllers\MyStore;

use App\Http\Controllers\Controller;
use App\Services\MyStore\ServiceSyncImages;
use Illuminate\Http\Request;

/**
 * Class ImageController
 *
 * @package App\Http\Controllers\MyStore
 */
class ImageController extends Controller
{
    protected $images;

    /**
     * CategoryController constructor.
     *
     * @param ServiceSyncImages $categories
     */
    public function __construct(ServiceSyncImages $images)
    {
        $this->images = $images;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function syncProductsImage()
    {
        return $this->images->srvGetImages();
    }
}
