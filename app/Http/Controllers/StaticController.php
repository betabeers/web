<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function info()
    {
        return view('static/info');
    }

    public function organize()
    {
        return view('static/organize');
    }

    public function codeOfConduct()
    {
        return view('static/code-of-conduct');
    }


}
