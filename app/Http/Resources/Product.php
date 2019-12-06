<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Product
 * @package App\Http\Resources
 */
class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'st_href' => $this->resource['meta']['href'],
            'st_type' => $this->resource['meta']['type'],
            'st_id' => $this->resource['id'],
            'st_account_id' =>$this->resource['accountId'],
            'st_owner_href' =>$this->resource['owner']['meta']['href'],
            'st_shared' => $this->resource['shared'],
            'st_version' => $this->resource['version'],
            'st_updated' => $this->resource['updated'],
            'st_name' => trim($this->resource['name']),
            'st_description' => isset($this->resource['description']) ? $this->resource['description'] : '',
            'st_code' => isset($this->resource['code']) ? $this->resource['code'] : '',
            'st_ext_code' => $this->resource['externalCode'],
            'st_archived' => $this->resource['archived'],
            'st_path_name' => $this->resource['pathName'],
            'st_category_id' => isset($this->resource['productFolder']) ? $this->resource['productFolder']['id'] : '',
            'st_uom_id' => isset($this->resource['uom']) ? $this->resource['uom']['id'] : '',
            'st_image_href' => isset($this->resource['image']) ? $this->resource['image']['meta']['href'] : '',
            'st_min_price' => $this->resource['minPrice'],
//            'st_min_price' => '34353',
            'st_sale_price' => $this->resource['salePrices'][0]['value'],
            'st_buy_price' => $this->resource['buyPrice']['value'],
            'st_supplier_href' => isset($this->resource['supplier']) ? $this->resource['supplier']['meta']['href'] : '',
            'st_article' => isset($this->resource['article']) ? $this->resource['article'] : '',
            'st_weight' => $this->resource['weight'],
            'st_volume' => $this->resource['volume'],
            'st_barcodes' => $this->resource['barcodes'][0],
            'st_stock' => $this->resource['stock'],
            'st_reserve' => isset($this->resource['reserve']) ? $this->resource['reserve'] : '',
            'st_inTransit' => $this->resource['inTransit'],
            'st_quantity' => $this->resource['quantity'],

        ];
    }
}
