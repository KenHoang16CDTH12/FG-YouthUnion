<?php

namespace App\Http\Controllers;

use App\UserHoatDong;
use Illuminate\Http\Request;

class UserHoatDongController extends Controller
{
    public function index()
    {
        return UserHoatDong::all();
    }

    public function show(UserHoatDong $userhoatdong)
    {
        return $userhoatdong;
    }

    public function store(Request $request)
    {
        $userhoatdong = UserHoatDong::create($request->all());

        return response()->json($userhoatdong, 201);
    }

    public function update(Request $request, UserHoatDong $userhoatdong)
    {
        $userhoatdong->update($request->all());

        return response()->json($userhoatdong, 200);
    }

    public function delete(UserHoatDong $userhoatdong)
    {
        $userhoatdong->delete();

        return response()->json(null, 204);
    }
}
