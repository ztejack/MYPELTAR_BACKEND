<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class NewsResource extends JsonResource
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
            'user' => $this->publiser,
            'title' => $this->title,
            'deskripsi' => $this->deskripsi,
            'image' => ($this->image == null) ? null : asset(Storage::url($this->image)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
