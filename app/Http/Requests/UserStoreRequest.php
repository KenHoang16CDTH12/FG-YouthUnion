<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|string|unique:users|email|max:100',
            'username' => 'required|string|unique:users|max:100',
            'password' => 'required|string|min:8',
            'active' => 'required|boolean',
            'role_id' => 'required|integer',
        ];
    }
}
