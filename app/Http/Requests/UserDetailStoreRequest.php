<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailStoreRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|integer|max:1',
            'date_of_birth' => 'date_format:"Y-m-d"',
            'phone' => 'string|max:50',                    
            'address' => 'string',                    
            'photo' => 'string',
            'student_code' => 'string|unique:user_details|max:50',
            'user_id' => 'required|int|max:10'  
        ];
    }
}
