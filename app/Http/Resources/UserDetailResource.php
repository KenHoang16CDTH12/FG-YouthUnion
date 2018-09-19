<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserDetailResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => $this->user,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'phone' => $this->phone,
            'address' => $this->address,
            'photo' => $this->photo,
            'student_code' => $this->student_code,
            'lop' => $this->lop,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
