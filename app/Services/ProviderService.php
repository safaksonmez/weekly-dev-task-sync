<?php
namespace App\Services;

use App\Repositories\ProviderRepository;

class ProviderService extends Service
{
    /**
     * @var ProviderRepository
     */
    protected $repository;

    public function __construct(ProviderRepository $repository)
    {
        parent::__construct($repository);
    }
}
