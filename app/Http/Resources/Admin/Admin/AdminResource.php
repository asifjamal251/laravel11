<?php

namespace App\Http\Resources\Admin\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function status($status)
    {
        if ($status == 1) {
            $status = '<span class="badge badge-soft-success">Active</span>';
        } elseif ($status == 2) {
            $status = '<span class="badge badge-soft-success">Password Not Set</span>';
        } else{
            $status = '<span class="badge badge-soft-success">Deactivated</span>';
        }
        return $status;
    }
    public function toArray($request)
    {
        return [
            'sn' => ++$request->start,
            'id' => $this->id,
            'role' => $this->role,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status($this->status),
        ];
    }
}
