<?php

namespace App\Http\Controllers;

use App\HoatDongType;
use Illuminate\Http\Request;

class HoatDongTypeController extends Controller
{
    public function index()
    {
    	return HoatDongType::all();
    }

    public function show(HoatDongType $hoatdongtype)
    {
    	return $hoatdongtype;
    }

    public function store (Request $request)
    {
    	$hoatdongtype = HoatDongType::create($request->all());

    	return response()->json($hoatdongtype, 201);
    }

    public function update(Request $request, HoatDongType $hoatdongtype)
    {
    	$hoatdongtype->update($request->all());

    	return response()->json($hoatdongtype, 200);
    }
    
    public function delete(HoatDongType $hoatdongtype)
    {
    	$hoatdongtype->delete();

    	return response()->json(null, 204);
    }
}
