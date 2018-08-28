<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NamHocUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nam_hoc' => 'string|unique:namhocs|nam_hoc|max:45',
        ];
    }
}
