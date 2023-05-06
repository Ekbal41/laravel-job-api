<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return data in camelCase

        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'category' => $this->category,
            'time' => $this->time,
            'location' => $this->location,
            'salary' => $this->salary,
            'description' => $this->description,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

        ];
    }
}
