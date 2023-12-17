<?php
namespace App\Services;

use App\Repositories\ProviderRepository;

class DeveloperService extends Service
{
    /**
     * @var DeveloperRepository
     */
    protected $repository;

    public function __construct(ProviderRepository $repository)
    {
        parent::__construct($repository);
    }
}
