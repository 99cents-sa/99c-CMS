<?php

namespace App\Http\Requests;

use App\Staff;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('staff_edit');
    }

    public function rules()
    {
        return [
            'role'        => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
