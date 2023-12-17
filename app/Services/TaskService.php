<?php
namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService extends Service
{
    /**
     * @var TaskRepository
     */
    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        parent::__construct($repository);
    }
}
