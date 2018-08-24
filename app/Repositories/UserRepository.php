<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserRepository
{
    /**
     * Get all of the users for a given user.
     *
     * @return Collection
     */
    public function collectionUser()
    {
        return UserResource::collection(User::paginate(25));
    }

    public function storeUser(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    public function updateUser(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return new UserResource($user);
    }

    public function deleteUser(User $user)
    {
      $user->delete();

      return response()->json(null, 204);
    }
}
