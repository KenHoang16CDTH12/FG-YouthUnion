<?php

namespace App\Repositories;

use App\User;
use App\Http\Resources\UserResource;

class UserDetailRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection()
    {
        // Return collection of objects as a resource
        return UserDetailResource::collection(UserDetail::orderBy('created_at', 'desc')->paginate(25));
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
        return new UserDetailResource(User::findOrFail($id));
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
        return new UserDetailResource(UserDetail::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $request | $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $userdetail = UserDetail::findOrFail($id);
        $userdetail->update($request->only([
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'date_of_birth',
            'phone',
            'address',
            'photo',
            'student_code',
            'user_id'
            ]));
        // Return object
        return new UserDetailResource($userdetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $userdetail = UserDetail::findOrFail($id);
      $userdetail->delete();
      return response()->json([
          'meesage' => 'Delete #' . $id . ' successful!'
      ], 200);
    }
}
