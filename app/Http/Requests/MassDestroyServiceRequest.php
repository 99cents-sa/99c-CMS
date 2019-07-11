<?php

namespace App\Http\Requests;

use App\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('service_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:services,id',
        ];
    }
}
