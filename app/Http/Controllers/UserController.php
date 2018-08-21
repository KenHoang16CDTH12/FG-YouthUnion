<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function login()
    {
    	// handle later
    }

    public function logout()
    {
    	// handle later
    }

    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    public function DetailStore()
    {
    	// handle later
    }

    public function DetailShow()
    {
    	// handle later
    }

    public function DetailUpdate()
    {
    	// handle later
    }

    public function DetailExists()
    {
    	// handle later
    }

}
