<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        return view('kriteria');
    }

    public function bobotkriteria()
    {
        return view('bobotkriteria');
    }

    public function subkriteria()
    {
        return view('subkriteria');
    }
}
