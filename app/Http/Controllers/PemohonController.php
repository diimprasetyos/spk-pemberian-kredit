<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PemohonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pemohons = Pemohon::all();
        $pemohonCount = Pemohon::count();
        return view('pemohon', compact('pemohons', 'pemohonCount'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahpemohon');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
         $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'city' => 'required',
        ]);

        Pemohon::create($request->all());

        return redirect()->route('pemohon')
            ->with('success', 'Pemohon created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $pemohons = Pemohon::findOrFail($id);
        return view('pemohon', compact('pemohons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $pemohons = Pemohon::findOrFail($id);
        return view('editpemohon', compact('pemohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
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
        
        return redirect()->route('pemohon')
            ->with('success', 'Pemohon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemohons = Pemohon::findOrFail($id);
        $pemohons->delete();

        return redirect()->route('pemohon')
            ->with('success', 'Pemohon deleted successfully');
    }
}
