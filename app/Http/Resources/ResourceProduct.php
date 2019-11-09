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
            //dd($this->resource),
            'type' => $this->resource->meta->type,
            'store_id' => $this->resource->id,
            'category_id' => null,
            'shared' => $this->resource->shared,
            'version' => $this->resource->version,
            'updated' => $this->resource->updated,
            'name' => $this->resource->name,
            'description' => isset($this->resource->description) ? $this->resource->description : '',
            'code' => isset($this->resource->code) ? $this->resource->code : '',
            'ext_code' => $this->resource->externalCode,
            'archived' => $this->resource->archived,
            'path_name' => $this->resource->pathName,
            'product_folder' => isset($this->resource->productFolder) ? $this->resource->productFolder->id : '',
            'uom' => isset($this->resource->uom) ? $this->resource->uom->name : '',
            'price' => $this->resource->buyPrice->value / 100,
            'article' => isset($this->resource->article) ? $this->resource->article : '',
            'store_image' => isset($this->resource->image) ? $this->resource->image->meta->href : '',
        ];
    }
}
