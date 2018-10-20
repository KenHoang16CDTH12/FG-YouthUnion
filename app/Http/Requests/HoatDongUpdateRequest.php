<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoatDongUpdateRequest extends FormRequest
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
            'name' => 'string|unique:hoatdongs|max:255',
            'desc' => 'string',
            'from_date' => 'date_format:"Y-m-d"|before:end_date',
            'end_date' => 'date_format:"Y-m-d"|after:from_date',
            'hoatdong_type_id' => 'integer'
        ];
    }
}
