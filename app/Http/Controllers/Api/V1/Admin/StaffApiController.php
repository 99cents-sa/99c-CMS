<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Staff;

class StaffApiController extends Controller
{
    public function index()
    {
        $staff = Staff::all();

        return $staff;
    }

    public function store(StoreStaffRequest $request)
    {
        return Staff::create($request->all());
    }

    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        return $staff->update($request->all());
    }

    public function show(Staff $staff)
    {
        return $staff;
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return response("OK", 200);
    }
}
