<?php

namespace App\Http\Requests;

use App\Service;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('service_create');
    }

    public function rules()
    {
        return [
            'label'       => [
                'required',
            ],
            'image'       => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
