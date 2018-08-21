<?php

namespace App\Http\Controllers;

use App\HocKy;
use Illuminate\Http\Request;

class HocKyController extends Controller
{
    public function index()
    {
    	return HocKy::all();
    }

    public function show(HocKy $hocky)
    {
    	return $hocky;
    }

    public function store(Request $request)
    {
    	$hocky = HocKy::create($request->all());

    	return reponse()->json($hocky, 201);
    }

    public function update(Request $request, HocKy $hocky)
    {
    	$hocky->update($request->all());

    	return response()->json($hocky, 200);
    }

    public function delete(HocKy $hocky)
    {
    	$hocky->delete();

    	return reponse()->json(null, 204);
    }
}
