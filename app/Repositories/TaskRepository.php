<?php
namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class TaskRepository extends Repository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Task $model)
    {
        parent::__construct($model);
    }
}
