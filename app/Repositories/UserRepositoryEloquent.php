<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserDetail;
use App\Repositories\Contracts\UserRepository;

class UserRepositoryEloquent extends BaseRepositoryEloquent implements UserRepository {

    public function __construct()
    {
        $this->model = app(User::class);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetail($id)
    {
        //Return object
        return new $this->dataResource(UserDetail::where('user_id', $id)->first());
    }

    /**
     * User of Lop
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function toLop($id)
    {
        $obj = User::join('user_details', 'user_details.user_id', 'users.id')
                        ->join('lops', 'lops.id', 'user_details.lop_id')
                        ->where('users.id', $id)
                        ->first(['lops.*']);
        // Return object
        return new $this->dataResource($obj);
    }

    /**
     * User of Khoa
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function toKhoa($id)
    {
        $obj =  User::join('user_details', 'user_details.user_id', 'users.id')
                        ->join('lops', 'lops.id', 'user_details.lop_id')
                        ->join('khoas', 'khoas.id', 'lops.khoa_id')
                        ->where('users.id', $id)
                        ->first(['khoas.*']);
        // Return object
        return new $this->dataResource($obj);
    }

    /**
     * User of LCD
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function toLCD($id)
    {
        $obj = User::join('user_details', 'user_details.user_id', 'users.id')
                        ->join('lops', 'lops.id', 'user_details.lop_id')
                        ->join('khoas', 'khoas.id', 'lops.khoa_id')
                        ->join('lcdoans', 'lcdoans.id', 'khoas.lcdoan_id')
                        ->where('users.id', $id)
                        ->first(['lcdoans.*']);
        // Return object
        return new $this->dataResource($obj);
    }



    /**
     * List users of LCD
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function usersOfLCD($idLCD, $entries, $sort)
    {

        $relations = $this->model->relations;

        $query = User::join('user_details', 'user_details.user_id', 'users.id')
                        ->join('lops', 'lops.id', 'user_details.lop_id')
                        ->join('khoas', 'khoas.id', 'lops.khoa_id')
                        ->join('lcdoans', 'lcdoans.id', 'khoas.lcdoan_id')
                        ->where('lcdoans.id', $idLCD);

        return new $this->dataCollection($query->with($relations)->latest()->orderBy('id', $sort)->paginate($entries, ['users.*']));
    }
}
