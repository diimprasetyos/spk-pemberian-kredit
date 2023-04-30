<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        return view('alternatif');
    }

    public function normalisasi()
    {
        return view('normalisasi');
    }
}
