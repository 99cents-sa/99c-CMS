<?php

namespace App\Http\Requests;

use App\Service;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('service_edit');
    }

    public function rules()
    {
        return [
            'label'       => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
