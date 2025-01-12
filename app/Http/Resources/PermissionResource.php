<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'name' => $this->name,  // User's name
            'roles' => $this->roles->first()->name ?? null, // User's roles
            'permissions' => $this->getAllPermissions()->pluck('name') ?? null, // User's permissions
        ];
    }
}
