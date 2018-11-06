<?php

namespace App\Repositories;

use App\Models\UserHoatDong;
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
    public function collectionJoined($id, $entries, $sort)
    {

        $relations = $this->model->relations;

        // Return collection of objects as a resource
        return new $this->dataCollection($this->model->with($relations)->latest()->where('user_id', $id)->orderBy('id', $sort)->paginate($entries));
    }
}
