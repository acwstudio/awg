<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Category
 * @package App\Http\Resources
 */
class Category extends JsonResource
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
            'st_name' => $this->resource['name'],
            'st_description' => isset($this->resource['description']) ? $this->resource['description'] : '',
            'st_code' => isset($this->resource['code']) ? $this->resource['code'] : '',
            'st_ext_code' => $this->resource['externalCode'],
            'st_archived' => $this->resource['archived'],
            'st_path_name' => $this->resource['pathName'],
            'st_nested_id' => isset($this->resource['productFolder']) ? $this->resource['productFolder']['id'] : '',

        ];
    }
}
