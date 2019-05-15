<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\AuthRepository;

class AuthRepositoryEloquent implements AuthRepository {

   protected $dataResource = UserResource::class;

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
    public function login($request) {
      $credentials = request(['email', 'password']);

      if (!Auth::attempt($credentials)) {
        return response()->json([
          'message' => 'Unauthorized'
        ], 401);
      }

      $user = $request->user();

      $tokenResult = $user->createToken('Personal Access Token');
      $token = $tokenResult->token;

      if ($request->remember_me) {
        $token->expires_at = Carbon::now()->addWeeks(1);
      }

      $token->save;

      return response()->json([
        'access_token' => $tokenResult->accessToken,
        'token_type' => 'Bearer',
        'expires_at' => Carbon::parse(
          $tokenResult->token->expires_at
        )->toDateTimeString(),
        'user' => new $this->dataResource($user)
      ]);
    }


    /**
     * Logout user (Revoke the token)
     *
     * @param $request
     * @return \Illuminate\Http\JsonResponse [string] message
     */
    public function logout($request)
    {
      $request->user()->token()->revoke();

      return response()->json([
        'message' => 'Successfully logged out'
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function user($request)
    {
        $user = $request->user();
        //Return object
        return new $this->dataResource($user);
    }
}
