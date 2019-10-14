<?php


namespace App\Services\API;

use App\Product;
use GuzzleHttp\Client;

/**
 * Class ApiServiceProduct
 *
 * @package App\Services\API
 */
class ApiServiceProduct extends ApiService
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param String $uri
     * @return \Illuminate\Config\Repository|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function servIndex()
    {
        $urlProd = ['path' => '/entity/product', 'parameters' => '?limit=10'];

        $endUrl = $this->endpointBuilder($urlProd);
        $products = $this->getEndpointAPI($endUrl);
//        dd($products);
        foreach ($products->rows as $product){

//            $urlProdID = [
//                'path' => $product->meta->href,
//                'path' => '/entity/product/' . $product->id,
//                'parameters' => '?expand=images,uom,minPrice.currency,productFolder,productFolder.productFolder,group'
//            ];

            $endUrl = $product->meta->href
                . '?expand=images,uom,minPrice.currency,productFolder,productFolder.productFolder,group';
//            $endUrl = $this->endpointBuilder($urlProdID);
            $prod = $this->getEndpointAPI($endUrl);
//            $product = Product::create([
//
//            ]);

            if ($prod->id) {
                dump($prod);
            }else {
                dump('no image');
            }

        }

        return response()->json($this->totalProducts);
    }
}