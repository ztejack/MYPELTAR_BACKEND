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
            'code_asset' => $this->code_ast,
            'serialnumber' => $this->serialnumber,
            'nama_asset' => $this->name,
            'merk' => $this->merk,
            'model' => $this->model,
            'spesifikasi' => $this->spesifikasi,
            'deskripsi' => $this->deskripsi,
            'lokasi' => $this->lokasi,
            'kategori' => $this->category,
            'status' => $this->status->status,
        ];
    }
}
