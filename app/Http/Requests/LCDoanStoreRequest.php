<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LCDoanStoreRequest extends FormRequest
{
    /**
     * Determine if the lcdoan is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:lcdoans',
            'desc' => 'string',
        ];
    }
}
