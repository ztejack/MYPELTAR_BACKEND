<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'serialnumber' => $this->serialnumber,
            'nama_asset' => $this->name,
            'merk' => $this->merk,
            'model' => $this->model,
            'spesifikasi' => $this->spesifikasi,
            'deskripsi' => $this->deskripsi,
            'lokasi' => $this->lokasi->unit,
            'kategori' => $this->kategori,
            'status' => $this->status,
        ];
    }
}
