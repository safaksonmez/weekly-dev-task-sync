<?php
namespace App\Services;

use App\Repositories\DeveloperRepository;

class DeveloperService extends Service
{
    /**
     * @var DeveloperRepository
     */
    protected $repository;

    public function __construct(DeveloperRepository $repository)
    {
        parent::__construct($repository);
    }
}
