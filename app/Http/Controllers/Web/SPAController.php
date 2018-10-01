<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SPAController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
