<?php

namespace App\Http\Resources;

use App\Models\TypeMaintenance;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MaintenanceResource extends JsonResource
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
            'user_inspektor' => UserResource::make($this->user_inspek),
            'asset' => AssetResource::make($this->asset),
            'type' => $this->type,
            'imagebefore' => ($this->imagebefore == null) ? null : asset(Storage::url($this->imagebefore)),
            'imageafter' => ($this->imageafter == null) ? null : asset($this->imageafter),
            'history' => PUpdateResource::collection($this->pupdate)
        ];
    }
}
