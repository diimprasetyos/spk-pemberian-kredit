<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;


class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berkas = Berkas::all();
        return view('berkas', compact('berkas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahberkas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'ktp' => 'required',
            'slip_gaji' => 'required',
        ]);

        Berkas::create($request->all());

        return redirect()->route('berkas')
            ->with('success', 'Berkas created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berkas $berkas)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berkas = Berkas::findOrFail($id);
        return view('editberkas', compact('berkas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required',
            'ktp' => 'required',
            'slip_gaji' => 'required',
        ]);
        $berkas = Berkas::findOrFail($id);
        $berkas->update($request->all());
        
        return redirect()->route('berkas')
            ->with('success', 'Berkas updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berkas = Berkas::findOrFail($id);
        $berkas->delete();

        return redirect()->route('berkas')
            ->with('success', 'Berkas deleted successfully');
    }
}
