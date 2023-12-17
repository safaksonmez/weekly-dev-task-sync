<?php

namespace App\Http\Controllers;

use App\Services\DeveloperService;

class DeveloperController extends Controller
{
    private $developerService;
    public function __construct(DeveloperService $developerService)
    {
        $this->developerService = $developerService;
    }
    public function index()
    {
        $developers = $this->developerService->getAll();

        return $developers;
    }
}
