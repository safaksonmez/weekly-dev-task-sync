<?php
namespace App\Repositories;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Model;

class DeveloperRepository extends Repository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Developer $model)
    {
        parent::__construct($model);
    }
}
