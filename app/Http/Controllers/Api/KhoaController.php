<?php

namespace App\Http\Controllers\Api;

use App\Khoa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KhoaController extends Controller
{
    public function index()
    {
    	return Khoa::all();
    }

    public function show(Khoa $khoa)
    {
    	return $khoa;
    }

    public function store(Request $request)
    {
        $khoa = Khoa::create($request->all());

        return response()->json($khoa, 201);
    }

    public function update(Request $request, Khoa $khoa)
    {
        $khoa->update($request->all());

        return response()->json($khoa, 200);
    }

    public function delete(Khoa $khoa)
    {
        $khoa->delete();

        return response()->json(null, 204);
    }
}
