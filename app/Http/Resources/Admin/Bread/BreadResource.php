<?php

namespace App\Http\Resources\Admin\Bread;

use Illuminate\Http\Resources\Json\JsonResource;
class BreadResource extends JsonResource
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
            'sn' => ++$request->start,
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
