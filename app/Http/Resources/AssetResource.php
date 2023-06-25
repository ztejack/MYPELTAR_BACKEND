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
            'code_asset' => $this->code_ast,
            'serialnumber' => $this->serialnumber,
            'nama_asset' => $this->name,
            'merk' => $this->merk,
            'model' => $this->model,
            'image' => ($this->image == null) ? null : asset(Storage::url($this->image)),
            'spesifikasi' => $this->spesifikasi,
            'deskripsi' => $this->deskripsi,
            'lokasi' => $this->lokasi->unit,
            'kategori' => $this->category->pluck('kategori'),
            'status' => $this->status->status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
