<?php
namespace App\Services;

use App\Repositories\TaskRepository;

class DeveloperService extends Service
{
    /**
     * @var DeveloperRepository
     */
    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        parent::__construct($repository);
    }
}
