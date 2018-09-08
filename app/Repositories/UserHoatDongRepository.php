<?php

namespace App\Repositories;

use App\UserHoatDong;
use App\Http\Resources\UserHoatDongResource;

class UserHoatDongRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries)
    {
        // Return collection of objects as a resource
        return UserHoatDongResource::collection(UserHoatDong::orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText)
    {
        $query = UserHoatDong::where('id', $searchText)
                     ->orWhere('user_id', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('hoatdong_id', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('status', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return UserHoatDongResource::collection($query->orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Return object
        return new UserHoatDongResource(UserHoatDong::findOrFail($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
        // Return object
        return new UserHoatDongResource(UserHoatDong::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $user_hoatdong = UserHoatDong::findOrFail($id);
        $user_hoatdong->update($request->only(['user_id', 'hoatdong_id']));
        // Return object
        return new UserHoatDongResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user_hoatdong = UserHoatDong::findOrFail($id);
      $user_hoatdong->delete();
      return response()->json([
          'meesage' => 'Delete #' . $id . ' successful!'
      ], 200);
    }
}
