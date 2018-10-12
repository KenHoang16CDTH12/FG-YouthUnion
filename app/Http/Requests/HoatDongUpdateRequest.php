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
            'name' => 'string',
            'desc' => 'string',
            'from_date' => 'date',
            'end_date' => 'date',
            'hocky_id' => 'integer',
            'hoatdong_type_id' => 'integer'
        ];
    }
}
