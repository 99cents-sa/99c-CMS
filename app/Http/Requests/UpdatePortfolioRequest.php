<?php

namespace App\Http\Requests;

use App\Portfolio;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('portfolio_edit');
    }

    public function rules()
    {
        return [
            'link'        => [
                'required',
            ],
            'name'        => [
                'required',
            ],
            'client'      => [
                'required',
            ],
            'text_colour' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'pinned'      => [
                'required',
            ],
            'order'       => [
                'required',
                'digits_between:0,10',
            ],
            'type'        => [
                'required',
            ],
        ];
    }
}
