<?php

namespace App\Http\Controllers\Api;

use App\HoatDong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoatDongController extends Controller
{
    public function index()
    {
        return HoatDong::all();
    }

    public function show(HoatDong $hoatdong)
    {
        return $hoatdong;
    }

    public function store(Request $request)
    {
        $hoatdong = HoatDong::create($request->all());

        return response()->json($hoatdong, 201);
    }

    public function update(Request $request, HoatDong $hoatdong)
    {
        $hoatdong->update($request->all());

        return response()->json($hoatdong, 200);
    }

    public function delete(HoatDong $hoatdong)
    {
        $hoatdong->delete();

        return response()->json(null, 204);
    }
}
