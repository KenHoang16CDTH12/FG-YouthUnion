<?php

namespace App\Http\Controllers\Api;

use App\NamHoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NamHocController extends Controller
{
    public function index()
    {
        return NamHoc::all();
    }

    public function show(NamHoc $namhoc)
    {
        return $namhoc;
    }

    public function store(Request $request)
    {
        $namhoc = NamHoc::create($request->all());

        return response()->json($namhoc, 201);
    }

    public function update(Request $request, NamHoc $namhoc)
    {
        $namhoc->update($request->all());

        return response()->json($namhoc, 200);
    }

    public function delete(NamHoc $namhoc)
    {
        $namhoc->delete();

        return response()->json(null, 204);
    }
}
