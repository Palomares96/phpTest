<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User_project extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'active' => $this->active,
            'currently_assigned' => $this->pivot->currently_assigned,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'self' => url("/api/users/{$this->id}"),
            'projects' => url("api/users/{$this->id}/projects"),
        ];
    }
}
