<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->users->name,
            'status' => $this->status->status,
            'description' => $this->description,
            'image' => ($this->image == null || $this->image == 0) ? null : asset(Storage::url($this->image)),
            'created_at' => $this->created_at,
            'update_at' => $this->updated_at
        ];
    }
}
