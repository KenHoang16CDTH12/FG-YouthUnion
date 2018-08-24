<?php

namespace App\Http\Controllers;

use App\LCDoan;
use Illuminate\Http\Request;

class LCDoanController extends Controller
{
    public function index()
    {
        return LCDoan::all();
    }

    public function show(LCDoan $lcdoan)
    {
        return $lcdoan;
    }

    public function store(Request $request)
    {
        $lcdoan = LCDoan::create($request->all());

        return response()->json($lcdoan, 201);
    }

    public function update(Request $request, LCDoan $lcdoan)
    {
        $lcdoan->update($request->all());

        return response()->json($lcdoan, 200);
    }

    public function delete(LCDoan $lcdoan)
    {
        $lcdoan->delete();

        return response()->json(null, 204);
    }
}
