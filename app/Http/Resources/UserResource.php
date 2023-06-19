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
            'nama' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'role' => $this->getRoleNames(),
            'subsatker' => $this->subsatker->subsatker,
            'satker' => $this->subsatker->satker->satker,
            // 'subsatker' => Subsatker_PResource::make($this->subsatker),
            // 'satker' => Satker_PResource::make($this->subsatker->satker),
        ];
    }
}
