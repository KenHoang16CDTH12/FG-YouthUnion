<?php

namespace App\Http\Controllers;

use App\Lop;
use Illuminate\Http\Request;

class LopController extends Controller
{
    public function index()
    {
        return Lop::all();
    }

    public function show(Lop $lop)
    {
        return $lop;
    }

    public function store(Request $request)
    {
        $lop = Lop::create($request->all());

        return response()->json($lop, 201);
    }

    public function update(Request $request, Lop $lop)
    {
        $lop->update($request->all());

        return response()->json($lop, 200);
    }

    public function delete(Lop $lop)
    {
        $lop->delete();

        return response()->json(null, 204);
    }
}
