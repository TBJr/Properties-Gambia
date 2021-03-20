<?php

namespace App\Http\Requests;

use App\Models\Plot;
use App\Models\Properties;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePropertiesRequest extends FormRequest
{
    /**public function authorize()
    {
        return true;
    }
    */
    public function rules()
    {
        return [
            'property_name' => [
                'required',
            ],
        ];
    }
}
