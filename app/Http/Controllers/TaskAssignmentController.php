<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskAssignmentResource;
use App\Services\TaskAssignmentService;
use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        $provider_id = $request->get('provider_id');
        $taskAssignments = $this->service->assignTasks($provider_id);

        return TaskAssignmentResource::make($taskAssignments);
    }
}
