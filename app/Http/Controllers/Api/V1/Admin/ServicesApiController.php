<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Service;

class ServicesApiController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return $services;
    }

    public function store(StoreServiceRequest $request)
    {
        return Service::create($request->all());
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        return $service->update($request->all());
    }

    public function show(Service $service)
    {
        return $service;
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response("OK", 200);
    }
}
