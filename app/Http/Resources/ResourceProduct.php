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
            'type' => $this->resource['meta']['type']
//            'title' => $this->resource['meta'],
//            'content' => $this->resource['content'],
//            'slug' => $this->resource['slug']
        ];
        //dd($this->resource['meta']);
        //return parent::toArray($request);
    }
}
