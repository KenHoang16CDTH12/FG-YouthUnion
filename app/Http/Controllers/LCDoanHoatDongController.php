<?php

namespace App\Http\Controllers;

use App\LCDoanHoatDong;
use Illuminate\Http\Request;

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
