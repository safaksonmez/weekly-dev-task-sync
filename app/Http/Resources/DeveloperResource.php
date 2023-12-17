<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeveloperResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'efficiency' => $this->efficiency,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tasks' => $this->tasks->pluck('name'),
        ];
    }
}
