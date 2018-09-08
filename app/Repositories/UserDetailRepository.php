<?php

namespace App\Repositories;

use App\Models\UserDetail;
use App\Http\Resources\UserDetailResource;

class UserDetailRepository
{
    /**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
    public function collection($entries)
    {
        // Return collection of objects as a resource
        return UserDetailResource::collection(UserDetail::orderBy('created_at', 'desc')->paginate($entries));
    }

    /**
     * Get search of the objects for a given model.
     *
     * @return Collection
     */
    public function collectionSearch($entries, $searchText)
    {
        $query = UserDetail::where('id', $searchText)
                     ->orWhere('first_name', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('middle_name', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('last_name', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('gender', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('date_of_birth', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('phone', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('address', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('photo', 'LIKE', '%'.$searchText.'%')
                     ->orWhere('student_code', 'LIKE', '%'.$searchText.'%');
        // Return collection of objects as a resource
        return UserDetailResource::collection($query->orderBy('created_at', 'desc')->paginate($entries));
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
        return new UserDetailResource(UserDetail::findOrFail($id));
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
