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
            'user_inspektor' => $this->user_inspek->name,
            'asset' => AssetResource::make($this->asset),
            'type' => $this->type->type,
            'status' => $this->status->status,
            'urgency_level' => $this->urgency->status_name,
            'description' => $this->description,
            'imagebefore' => ($this->imagebefore == null || $this->imagebefore == 0) ? null : asset(Storage::url($this->imagebefore)),
            'imageafter' => ($this->imageafter == null || $this->imageafter == 0) ? null : asset($this->imageafter),
            'history' => PUpdateResource::collection($this->pupdates->all())
        ];
    }
}
