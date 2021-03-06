<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Service;

class ServicesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('service_access'), 403);

        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('service_create'), 403);

        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        abort_unless(\Gate::allows('service_create'), 403);

        $service = Service::create($request->all());

        if ($request->input('image', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        abort_unless(\Gate::allows('service_edit'), 403);

        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        abort_unless(\Gate::allows('service_edit'), 403);

        $service->update($request->all());

        if ($request->input('image', false)) {
            if (!$service->image || $request->input('image') !== $service->image->file_name) {
                $service->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($service->image) {
            $service->image->delete();
        }

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        abort_unless(\Gate::allows('service_show'), 403);

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_unless(\Gate::allows('service_delete'), 403);

        $service->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Service::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
