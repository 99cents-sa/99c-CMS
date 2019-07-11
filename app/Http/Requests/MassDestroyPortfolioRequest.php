<?php

namespace App\Http\Requests;

use App\Portfolio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPortfolioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('portfolio_delete'), 403, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:portfolios,id',
        ];
    }
}
