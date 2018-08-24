<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * The User repository instance.
     *
     * @var UserRepository
     */
    protected $users;


    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return $this->users->collectionUser();
    }

    public function store(StoreUserRequest $request)
    {
        return $this->users->storeUser($request);
    }

    public function show(User $user)
    {
      return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return $this->users->updateUser($request, $user);
    }

    public function destroy(User $user)
    {
        return $this->users->deleteUser($user);
    }
}
