<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AssetResource extends JsonResource
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
            'stockcode' => $this->stockcode,
            'asset_code' => $this->code_ast,
            'serialnumber' => $this->serialnumber,
            'asset_name' => $this->name,
            'brand' => $this->brand,
            'model' => $this->model,
            'image' => ($this->image == null || $this->image == 0) ? null : asset(Storage::url($this->image)),
            // 'image' => ($this->image == null) ? null : url('storage/' . $this->image),
            'specifications' => $this->specifications,
            'description' => $this->description,
            'location' => $this->lokasi->unit,
            'category' => $this->category->pluck('category'),
            'status' => $this->status->status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
