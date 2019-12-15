<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Unit
 * @package App\Http\Resources
 */
class Unit extends JsonResource
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
            'st_version' => $this->resource['version'],
            'st_updated' => $this->resource['updated'],
            'st_name' => $this->resource['name'],
            'st_description' => isset($this->resource['description']) ? $this->resource['description'] : '',
            'st_code' => isset($this->resource['code']) ? $this->resource['code'] : '',
            'st_ext_code' => $this->resource['externalCode'],

        ];
    }
}
