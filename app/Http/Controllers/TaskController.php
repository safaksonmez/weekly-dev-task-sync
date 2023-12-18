<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @var TaskService
     */
    private $service;
    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $tasks = $this->service->getAll();

        return TaskResource::collection($tasks);
    }

    public function show($id)
    {
        $task = $this->service->show($id);

        return TaskResource::make($task);
    }

    public function store(Request $request)
    {
        $task = $this->service->create($request->all());

        return TaskResource::make($task);
    }

    public function update(Request $request, $id)
    {
        $task = $this->service->update($id, $request->all());

        return TaskResource::make($task);
    }

    public function destroy($id)
    {
        $task = $this->service->delete($id);

        return $task;
    }

    public function view()
    {
        return view('tasks');
    }

}
