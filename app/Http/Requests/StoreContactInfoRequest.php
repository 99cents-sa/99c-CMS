<?php

namespace App\Http\Requests;

use App\ContactInfo;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactInfoRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('contact_info_create');
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
                'digits_between:0,10',
            ],
        ];
    }
}
