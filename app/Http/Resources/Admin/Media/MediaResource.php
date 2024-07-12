<?php

namespace App\Http\Resources\Admin\Media;

use Illuminate\Http\Resources\Json\JsonResource;
class MediaResource extends JsonResource
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
            'id'=>$this->id,
            'original_name'=>$this->original_name, 
            'name'=>$this->name, 'size'=>$this->size, 
            'type'=>$this->type,
            'file'=>$this->file?'<img class="img-thumbnail avatar-img rounded avatar-sm" src="'.asset($this->file).'">':'N/A'
        ];
    }
}
