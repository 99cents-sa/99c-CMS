<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'name'  => [
                'required',
            ],
        ];
    }
}
