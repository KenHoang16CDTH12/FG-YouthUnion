<?php

namespace App\Repositories;

use App\UserHoatDong;
use Illuminate\Http\Request;
use App\Http\Resources\UserHoatDongResource;
use App\Http\Requests\StoreUserHoatDongRequest;
use App\Http\Requests\UpdateUserHoatDongRequest;

class UserHoatDongRepository
{
    /**
     * Get all of the UserHoatDongs for a given UserHoatDong.
     *
     * @return Collection
     */
    public function collectionUserHoatDong()
    {
        return UserHoatDongResource::collection(UserHoatDong::paginate(25));
    }

    public function storeUserHoatDong(StoreUserHoatDongRequest $request)
    {
        return new UserHoatDongResource(UserHoatDong::create($request->all()));
    }

    public function updateUserHoatDong(UpdateUserHoatDongRequest $request, UserHoatDong $userhoatdong)
    {
        $userhoatdong->update($request->all());

        return new UserHoatDongResource($userhoatdong);
    }

    public function deleteUserHoatDong(UserHoatDong $userhoatdong)
    {
      $userhoatdong->delete();

      return response()->json(null, 204);
    }
}
