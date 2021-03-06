<?php

namespace App\Http\Requests;

use App\ContactInfo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactInfoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('contact_info_edit');
    }

    public function rules()
    {
        return [
            'name'    => [
                'required',
            ],
            'address' => [
                'required',
            ],
            'email'   => [
                'required',
            ],
            'phone'   => [
                'required',
            ],
        ];
    }
}
