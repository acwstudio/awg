<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProductImage
 * @package App\Http\Resources
 */
class ProductImage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $arr = explode('/', $this->resource['meta']['href']);
        $last_key = array_key_last($arr);

        return [
            'st_id' => $arr[$last_key],
            'st_href_download' => $this->resource['meta']['href'],
            'st_title' => trim($this->resource['title']),
            'st_file_name' => $this->resource['filename'],
            'st_size' => $this->resource['size'],
            'st_updated' => $this->resource['updated'],
            'st_mini_href_download' => $this->resource['miniature']['href'],
            'st_tiny_href_download' => $this->resource['tiny']['href']
        ];
    }
}
