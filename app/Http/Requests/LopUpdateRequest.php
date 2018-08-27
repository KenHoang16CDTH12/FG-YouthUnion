<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LopUpdateRequest extends FormRequest
{
    /**
     * Determine if the lop is authorized to make this request.
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
            'name' => 'string',
            'desc' => 'string',
            'khoa_id' => 'integer'
        ];
    }
}
