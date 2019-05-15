<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\UserDetail;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Response;

class UserRepositoryEloquent extends BaseRepositoryEloquent implements UserRepository {

    public function __construct()
    {
        $this->model = app(User::class);
    }

    public function create($params)
    {
        $avatar = "";
        if (array_key_exists("image", $params))
            $avatar = Avatar::create($params->image)->getImageObject()->encode('png');
        $data = User::create([
                'email' =>  array_key_exists("email", $params) ? $params['email'] : null,
                'username' => array_key_exists("username", $params) ? $params['username']  : null,
                'password' => array_key_exists("password", $params) ? Hash::make($params['password'])  : null,
                'remember_token' => str_random(10),
                'active' => array_key_exists("active", $params) ? $params['active'] : null,
                'role_id' => array_key_exists("role_id", $params) ? $params['role_id'] : null,
                'class_id' => array_key_exists("class_id", $params) ? $params['class_id'] : null,
                'image' => $avatar
            ]);
        Storage::put('userimage/'.$data->id.'/default.png', (string) $avatar);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showDetail($id)
    {
        //Return object
        return new $this->dataResource(UserDetail::where('user_id', $id)->first());
    }

    /**
     * User of Lop
     *
     * @param $id
     * @return Response
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
     * @param $id
     * @return Response
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
     * @param $id
     * @return Response
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
     * @param $idLCD
     * @param $entries
     * @param $sort
     * @return Response
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
