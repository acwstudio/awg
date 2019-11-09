<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ResourceWebHook
 *
 * @package App\Http\Resources
 */
class ResourceWebHook extends JsonResource
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
            'type' => $this->resource->events['0']['meta']['type'],
            'href' => $this->resource->events['0']['meta']['href'],
            'action' => $this->resource->events['0']['action'],
            'account_id' => $this->resource->events['0']['accountId'],
//            'queued_up' => 0,
//            'done' => $this->resource->updated,
        ];
    }
}
