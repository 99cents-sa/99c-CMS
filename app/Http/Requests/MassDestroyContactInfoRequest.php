<?php

namespace App\Http\Requests;

use App\ContactInfo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyContactInfoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contact_info_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contact_infos,id',
        ];
    }
}
