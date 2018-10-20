<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserDetail;
use App\Http\Resources\UserResource;
use App\Http\Resources\DataResource;
use App\Http\Resources\UserDetailResource;

class UserRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries, $sort)
    {
        // Return collection of objects as a resource
        return UserResource::collection(User::orderBy('id', $sort)->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText, $sort)
    {
        $query = User::where('id', $searchText)
                     ->orWhere('username', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('email', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return UserResource::collection($query->orderBy('id', $sort)->paginate($entries));
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
        return new UserResource(User::findOrFail($id));
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
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['username','email','password','active', 'role_id']));
        // Return object
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return response()->json(null, 204);
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
        return new UserDetailResource(UserDetail::where('user_id', $id)->first());
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
        //return response()->json($obj, 200);
        return new DataResource($obj);
    }

    /**
     * User of Khoa
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function toKhoa($id)
    {
        $obj = User::join('user_details', 'user_details.user_id', 'users.id')
                        ->join('lops', 'lops.id', 'user_details.lop_id')
                        ->join('khoas', 'khoas.id', 'lops.khoa_id')
                        ->where('users.id', $id)
                        ->first(['khoas.*']);
        // Return object
        //return response()->json($obj, 200);
        return new DataResource($obj);
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
        //return response()->json($obj, 200);
        return new DataResource($obj);
    }
}
