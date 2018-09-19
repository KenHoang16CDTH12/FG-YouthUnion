<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    /**
     * The repository instance.
     *
     * @var ObjectRepository
     */
    protected $respository;


    /**
     * Create a new controller instance.
     *
     * @param  ObjectRepository  $objects
     * @return void
     */
    public function __construct(AuthRepository $respository)
    {
        $this->respository = $respository;
    }
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(UserLoginRequest $request)
    {
      $request->validated();

      return $this->respository->login($request);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
      return $this->respository->logout($request);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return $this->respository->user($request);
    }
}
