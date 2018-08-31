<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoatDongStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:hoatdongs|max:255',
            'desc' => 'required|string',
            'from_date' => 'required|date',
            'end_date' => 'required|date',
            'hocky_id' => 'required|integer|max:10',
            'hoatdong_type_id' => 'required|integer|max:10'
        ];
    }
}
