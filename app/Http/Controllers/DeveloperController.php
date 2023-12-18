<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeveloperResource;
use App\Services\DeveloperService;
use Illuminate\Http\Request;

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

        return DeveloperResource::collection($developers);
    }

    public function show($id)
    {
        $developer = $this->developerService->show($id);

        return DeveloperResource::make($developer);
    }

    public function store(Request $request)
    {
        $developer = $this->developerService->create($request->all());

        return DeveloperResource::make($developer);
    }

    public function update(Request $request, $id)
    {
        $developer = $this->developerService->update($id, $request->all());

        return DeveloperResource::make($developer);
    }

    public function destroy($id)
    {
        $developer = $this->developerService->delete($id);

        return $developer;
    }

    public function view()
    {
        $developers = $this->developerService->getAll();

        return view('developers', compact('developers'));
    }

}
