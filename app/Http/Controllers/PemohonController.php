<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemohons = Pemohon::get();
        return view('pemohon.index', compact('pemohons'))->with('i', 0);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemohons = Pemohon::get();
        return view('pemohon.create', compact('pemohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'city' => 'required',
        ]);

        Pemohon::create($request->all());

        return redirect()->route('pemohons.index')
            ->with('success', 'Pemohon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemohon $pemohons, $id)
    {
        $pemohons = Pemohon::findOrFail($id);
        return view('pemohon.edit', compact('pemohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemohon $pemohons, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'city' => 'required',
        ]);
        $pemohons = Pemohon::findOrFail($id);
        $pemohons->update($request->all());

        return redirect()->route('pemohons.index')
            ->with('success', 'Pemohon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemohon $pemohons, $id)
    {
        $pemohons = Pemohon::findOrFail($id);
        $pemohons->delete();

        return redirect()->route('pemohons.index')
            ->with('success', 'Pemohon deleted successfully');
    }

    public function print()
    {
        $pemohons = Pemohon::all();
        $pdf = Pdf::loadview('pemohon.print', compact('pemohons'));
        return $pdf->download('laporan-pemohon.pdf');
    }
}
