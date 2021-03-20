<?php

namespace App\Http\Requests;

use App\Models\Plot;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePlotRequest extends FormRequest
{
    /**public function authorize()
    {
        return true;
    }
    */
    public function rules()
    {
        return [
            'plot_name' => [
                'required',
            ],
        ];
    }
}
