<?php

namespace App\Http\Controllers\Admin;

use App\ContactInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactInfoRequest;
use App\Http\Requests\StoreContactInfoRequest;
use App\Http\Requests\UpdateContactInfoRequest;

class ContactInfoController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('contact_info_access'), 403);

        $contactInfos = ContactInfo::all();

        return view('admin.contactInfos.index', compact('contactInfos'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('contact_info_create'), 403);

        return view('admin.contactInfos.create');
    }

    public function store(StoreContactInfoRequest $request)
    {
        abort_unless(\Gate::allows('contact_info_create'), 403);

        $contactInfo = ContactInfo::create($request->all());

        return redirect()->route('admin.contact-infos.index');
    }

    public function edit(ContactInfo $contactInfo)
    {
        abort_unless(\Gate::allows('contact_info_edit'), 403);

        return view('admin.contactInfos.edit', compact('contactInfo'));
    }

    public function update(UpdateContactInfoRequest $request, ContactInfo $contactInfo)
    {
        abort_unless(\Gate::allows('contact_info_edit'), 403);

        $contactInfo->update($request->all());

        return redirect()->route('admin.contact-infos.index');
    }

    public function show(ContactInfo $contactInfo)
    {
        abort_unless(\Gate::allows('contact_info_show'), 403);

        return view('admin.contactInfos.show', compact('contactInfo'));
    }

    public function destroy(ContactInfo $contactInfo)
    {
        abort_unless(\Gate::allows('contact_info_delete'), 403);

        $contactInfo->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactInfoRequest $request)
    {
        ContactInfo::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
