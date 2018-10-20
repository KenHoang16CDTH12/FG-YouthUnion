<?php

namespace App\Repositories;

use App\Models\UserHoatDong;
use App\Http\Resources\UserHoatDongResource;

class UserHoatDongRepository
{
    /**
     * Attendance.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function attendance($request)
    {
        // Return object
        $object = UserHoatDong::where('user_id', $request['user_id'])
                            ->where('hoatdong_id', $request['hoatdong_id'])
                            ->first();
        if ($object == null) {
            return new UserHoatDongResource(UserHoatDong::create($request->all()));
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
        // Return collection of objects as a resource
        return UserHoatDongResource::collection(UserHoatDong::where('user_id', $id)->orderBy('id', $sort)->paginate($entries));
    }
}
