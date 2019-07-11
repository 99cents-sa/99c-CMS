<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ContactInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactInfoRequest;
use App\Http\Requests\UpdateContactInfoRequest;

class ContactInfoApiController extends Controller
{
    public function index()
    {
        $contactInfos = ContactInfo::all();

        return $contactInfos;
    }

    public function store(StoreContactInfoRequest $request)
    {
        return ContactInfo::create($request->all());
    }

    public function update(UpdateContactInfoRequest $request, ContactInfo $contactInfo)
    {
        return $contactInfo->update($request->all());
    }

    public function show(ContactInfo $contactInfo)
    {
        return $contactInfo;
    }

    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return response("OK", 200);
    }
}
