<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskAssignmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'assignment' => $this['assignments'],
            'total_weeks' => $this['total_weeks'],
        ];
    }
}
