<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProviderResource;
use App\Services\ProviderService;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    private $providerService;
    public function __construct(ProviderService $providerService)
    {
        $this->providerService = $providerService;
    }
    public function index()
    {
        $providers = $this->providerService->getAll();

        return ProviderResource::collection($providers);
    }

    public function show($id)
    {
        $provider = $this->providerService->show($id);

        return ProviderResource::make($provider);
    }

    public function store(Request $request)
    {
        $provider = $this->providerService->create($request->all());

        return ProviderResource::make($provider);
    }

    public function update(Request $request, $id)
    {
        $provider = $this->providerService->update($id, $request->all());
        return $provider;
    }

    public function destroy($id)
    {
        $provider = $this->providerService->delete($id);
        return $provider;
    }

    public function view()
    {
        $providers = $this->providerService->getAll();
        return view('providers', compact('providers'));
    }

}
