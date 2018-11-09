<?php

namespace App\Repositories;

use App\Models\UserHoatDong;
use App\Models\User;
use App\Repositories\Contracts\UserHoatDongRepository;

class UserHoatDongRepositoryEloquent extends BaseRepositoryEloquent implements UserHoatDongRepository {

    public function __construct()
    {
        $this->model = app(UserHoatDong::class);
    }

    /**
     * Attendance.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function attendance($params)
    {
        $object = $this->model->checkExistsObject($params);
        if ($object == null) {
            return new $this->dataResource(UserHoatDong::create($params->all()));
        } else {
            $object->delete();
            return response()->json(null, 204);
        }
    }

    /**
     * Collection Joined
     *
     * @param  $id|$entries|$sort
     * @return \Illuminate\Http\Response
     */
    public function paginateJoined($user_id, $entries, $sort)
    {

        $relations = $this->model->relations;

        // Return collection of objects as a resource
        return new $this->dataCollection($this->model->with($relations)->latest()->where('user_id', $user_id)->orderBy('id', $sort)->paginate($entries));
    }


    /**
     * Collection not joiner in hoatdong
     *
     * @param  $id|$entries|$sort
     * @return \Illuminate\Http\Response
     */
    public function paginateNotJoiner($hoatdong_id, $entries, $sort)
    {
        // query user chua tham gia hoat dong nao
        // $query = User::leftJoin('user_hoatdongs', 'user_hoatdongs.user_id', 'users.id')
        //     ->whereNull('user_hoatdongs.user_id')
        //     ->get();

        $query = User::leftJoin('user_hoatdongs', 'user_hoatdongs.user_id', 'users.id')
             ->whereNull('user_hoatdongs.user_id')
             ->orWhere('user_hoatdongs.hoatdong_id', '!=', $hoatdong_id);

        // Return collection of objects as a resource
        return new $this->dataCollection($query->with(['role'])->latest()->orderBy('id', $sort)->paginate($entries, ['users.*']));
    }

    /**
     * Collection HoatDongId
     *
     * @param  $id|$entries|$sort
     * @return \Illuminate\Http\Response
     */
    public function paginateHoatDongId($hoatdong_id, $entries, $sort)
    {

        $relations = $this->model->relations;

        // Return collection of objects as a resource
        return new $this->dataCollection($this->model->with($relations)->latest()->where('hoatdong_id', $hoatdong_id)->orderBy('id', $sort)->paginate($entries));
    }
}
