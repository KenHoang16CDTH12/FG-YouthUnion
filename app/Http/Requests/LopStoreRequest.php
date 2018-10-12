<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LopStoreRequest extends FormRequest
{
    /**
     * Determine if the lop is authorized to make this request.
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
            'name' => 'required|string|max:255',
            'desc' => 'string',
            'khoa_id' => 'required|int|max:10',
        ];
    }
}
