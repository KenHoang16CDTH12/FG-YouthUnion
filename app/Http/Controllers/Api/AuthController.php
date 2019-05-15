<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AuthRepository;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    /**
     * The repository instance.
     *
     * @var ObjectRepository
     */
    protected $repository;


    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->repository = app(AuthRepository::class);
    }

    /**
     * Login user and create token
     *
     * @param UserLoginRequest $request
     * @return  [string] access_token
     */
    public function login(UserLoginRequest $request)
    {
      $request->validated();

      return $this->repository->login($request);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return  [string] message
     */
    public function logout(Request $request)
    {
      return $this->repository->logout($request);
    }

    /**
     * Get the authenticated User
     *
     * @param Request $request
     * @return  [json] user object
     */
    public function user(Request $request)
    {
        return $this->repository->user($request);
    }
}
