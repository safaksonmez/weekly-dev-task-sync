<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'task_value_key',
        'task_estimated_duration_key',
        'task_name_key',
        'url',
    ];

    /**
     * Relationship with tasks.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Fetch tasks from the provider.
     */
    public function fetchTasks()
    {
        $response = Http::get($this->url);
        $tasks = $response->json();

        return $tasks;
    }
}
