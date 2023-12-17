<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskAssignmentResource;
use App\Services\TaskAssignmentService;

class TaskAssignmentController extends Controller
{
    /**
     * @var TaskAssignmentService
     */
    private $service;
    public function __construct(TaskAssignmentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $taskAssignments = $this->service->assignTasks();

        return TaskAssignmentResource::make($taskAssignments);
    }
}
