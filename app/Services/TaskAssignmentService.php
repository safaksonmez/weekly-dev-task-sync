<?php

namespace App\Services;

use App\Models\Developer;
use App\Models\Task;

class TaskAssignmentService
{
    public function assignTasks(int $provider_id = null)
    {
        $tasks = Task::when($provider_id, function ($query) use ($provider_id) {
            return $query->where('provider_id', $provider_id);
        })->get()->sortByDesc(function ($task) {
            return $task->estimated_duration * $task->value;
        });

        $developers = Developer::all()->sortByDesc('efficiency');
        $assignments = [];
        $week = 1;

        while ($tasks->isNotEmpty()) {
            foreach ($developers as $developer) {
                $developer->available_hours = 45;
                $assignments["Week" . $week][$developer->name] = $assignments["Week" . $week][$developer->name] ?? [];
            }

            foreach ($tasks as $key => $task) {
                foreach ($developers as $developer) {
                    $taskDurationForDeveloper = ($task->estimated_duration * $task->value) / $developer->efficiency;
                    if ($developer->available_hours >= $taskDurationForDeveloper) {
                        $developer->available_hours -= $taskDurationForDeveloper;
                        $assignments["Week" . $week][$developer->name][] = $task->name;
                        $task->developer()->associate($developer->id);
                        $task->save();
                        $tasks->forget($key);
                        break;
                    }
                }
            }

            $week++;
        }
        $data = [
            'assignments' => $assignments,
            'total_weeks' => $week - 1,
        ];
        return $data;
    }
}
