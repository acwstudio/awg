<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ResourceProduct
 *
 * @package App\Http\Resources
 */
class ResourceProduct extends JsonResource
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
            //$this->resource,
            'type' => $this->resource['meta']['type'],
            'store_id' => $this->resource['id'],
            'category_id' => null,
            'shared' => $this->resource['shared'],
            'version' => $this->resource['version'],
            'updated' => $this->resource['updated'],
            'name' => $this->resource['name'],
            'description' => key_exists('description', $this->resource) ? $this->resource['description'] : '',
            'code' => key_exists('code', $this->resource) ? $this->resource['code'] : '',
            'ext_code' => $this->resource['externalCode'],
            'archived' => $this->resource['archived'],
            'path_name' => $this->resource['pathName'],
            'product_folder' => key_exists('productFolder', $this->resource) ? $this->resource['productFolder']['id'] : '',
            'uom' => key_exists('uom', $this->resource) ? $this->resource['uom']['name'] : '',
            'price' => $this->resource['buyPrice']['value'] / 100,
            'article' => key_exists('article', $this->resource) ? $this->resource['article'] : '',
            'store_image' => key_exists('image', $this->resource) ? $this->resource['image']['meta']['href'] : '',
        ];

    }
}
