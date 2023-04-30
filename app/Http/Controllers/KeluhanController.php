<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keluhan = Keluhan::all();
        return view('keluhan', compact('keluhan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahkeluhan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'permasalahan' => 'required',
            'detail_permasalahan' => 'required',
        ]);
        return redirect()->route('keluhan')
            ->with('success', 'Keluhan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keluhan $keluhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keluhan $keluhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluhan $keluhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluhan $keluhan)
    {
        //
    }
}
