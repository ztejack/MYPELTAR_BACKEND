<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            // 'id' => $this->id,
            'Nama' => $this->name,
            'Email' => $this->email,
            'Username' => $this->username,
            'Role' => $this->role->role,
            'Satker' => $this->subsatker->satker->satker,
            'SubSatker' => $this->subsatker->subsatker,
        ];
    }
}
