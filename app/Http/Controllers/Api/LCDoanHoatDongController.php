<?php

namespace App\Http\Controllers\Api;

use App\LCDoanHoatDong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LCDoanHoatDongController extends Controller
{
    public function index()
    {
        return LCDoanHoatDong::all();
    }

    public function show(LCDoanHoatDong $lcdoanhoatdong)
    {
        return $lcdoanhoatdong;
    }

    public function store(Request $request)
    {
        $lcdoanhoatdong = LCDoanHoatDong::create($request->all());

        return response()->json($lcdoanhoatdong, 201);
    }

    public function update(Request $request, LCDoanHoatDong $lcdoanhoatdong)
    {
        $lcdoanhoatdong->update($request->all());

        return response()->json($lcdoanhoatdong, 200);
    }

    public function delete(LCDoanHoatDong $lcdoanhoatdong)
    {
        $lcdoanhoatdong->delete();

        return response()->json(null, 204);
    }
}
