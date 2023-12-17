<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'task_value_key' => $this->task_value_key,
            'task_estimated_duration_key' => $this->task_estimated_duration_key,
            'task_name_key' => $this->task_name_key,
            'url' => $this->url,
        ];
    }
}
