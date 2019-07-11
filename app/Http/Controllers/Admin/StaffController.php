<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStaffRequest;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Staff;

class StaffController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('staff_access'), 403);

        $staff = Staff::all();

        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('staff_create'), 403);

        return view('admin.staff.create');
    }

    public function store(StoreStaffRequest $request)
    {
        abort_unless(\Gate::allows('staff_create'), 403);

        $staff = Staff::create($request->all());

        if ($request->input('image', false)) {
            $staff->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($request->input('name', false)) {
            $staff->addMedia(storage_path('tmp/uploads/' . $request->input('name')))->toMediaCollection('name');
        }

        return redirect()->route('admin.staff.index');
    }

    public function edit(Staff $staff)
    {
        abort_unless(\Gate::allows('staff_edit'), 403);

        return view('admin.staff.edit', compact('staff'));
    }

    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        abort_unless(\Gate::allows('staff_edit'), 403);

        $staff->update($request->all());

        if ($request->input('image', false)) {
            if (!$staff->image || $request->input('image') !== $staff->image->file_name) {
                $staff->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($staff->image) {
            $staff->image->delete();
        }

        if ($request->input('name', false)) {
            if (!$staff->name || $request->input('name') !== $staff->name->file_name) {
                $staff->addMedia(storage_path('tmp/uploads/' . $request->input('name')))->toMediaCollection('name');
            }
        } elseif ($staff->name) {
            $staff->name->delete();
        }

        return redirect()->route('admin.staff.index');
    }

    public function show(Staff $staff)
    {
        abort_unless(\Gate::allows('staff_show'), 403);

        return view('admin.staff.show', compact('staff'));
    }

    public function destroy(Staff $staff)
    {
        abort_unless(\Gate::allows('staff_delete'), 403);

        $staff->delete();

        return back();
    }

    public function massDestroy(MassDestroyStaffRequest $request)
    {
        Staff::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
