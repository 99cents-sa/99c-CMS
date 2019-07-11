<?php

namespace App\Http\Requests;

use App\Staff;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyStaffRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('staff_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:staff,id',
        ];
    }
}
