<?php

namespace App\Http\Requests;

use App\Staff;
use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('staff_create');
    }

    public function rules()
    {
        return [
            'image'       => [
                'required',
            ],
            'name'        => [
                'required',
            ],
            'role'        => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
