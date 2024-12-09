<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class InspeksiResource extends JsonResource
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
            'description' => $this->description,
            'inspektor' => $this->user->name,
            'asset' => AssetResource::make($this->asset),
            // 'maintenance' => MaintenanceResource::make($this->maintenance),
            'maintenance' => $this->maintenance,
            'image' => ($this->image == null) ? null : asset(Storage::url($this->image)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
