<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Pemohon;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Contracts\Service\Attribute\Required;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemohons = Pemohon::get();
        $pinjaman = Pinjaman::select(
            'pinjaman.id as id',
            'pinjaman.id_pemohon as idp',
            'pemohons.nama as nama',
            'pinjaman.tanggal_pinjaman as tgl',
            'pinjaman.besar_pinjaman as nom',
            'pinjaman.angsuran as ang',
            'pinjaman.bunga as bng',
            'pinjaman.jangka_waktu as jngk',
        )
            ->leftJoin('pemohons', 'pinjaman.id_pemohon', '=', 'pemohons.id')
            ->get();

        return view('pinjaman.index', compact('pinjaman', 'pemohons'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pemohon $pemohons)
    {
        $pemohons = Pemohon::all();

        return view('pinjaman.create', compact('pemohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemohon' => 'required',
            'tanggal_pinjaman' => 'required',
            'besar_pinjaman' => 'required',
            'bunga' => 'required',
            'angsuran' => 'required',
            'jangka_waktu' => 'required',
        ]);

        Pinjaman::create($request->all());

        return redirect()->route('pinjamans.index')
            ->with('success', 'Pinjaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pemohons = Pemohon::all();
        return view('pinjaman.edit', compact('pinjaman', 'pemohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjaman $pinjaman, $id)
    {
        $request->validate([
            'id_pemohon' => 'required',
            'tanggal_pinjaman' => 'required',
            'besar_pinjaman' => 'required',
            'bunga' => 'required',
            'angsuran' => 'required',
            'jangka_waktu' => 'required',
        ]);

        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update($request->all());

        return redirect()->route('pinjamans.index')
            ->with('success', 'Pinjaman berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjaman $pinjaman, $id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        return redirect()->route('pinjamans.index')
            ->with('success', 'Pinjaman berhasil dihapus.');
    }

    public function print()
    {
        $pinjaman = Pinjaman::select(
            'pinjaman.id as id',
            'pinjaman.id_pemohon as idp',
            'pemohons.nama as nama',
            'pinjaman.tanggal_pinjaman as tgl',
            'pinjaman.besar_pinjaman as nom',
            'pinjaman.angsuran as ang',
            'pinjaman.bunga as bng',
            'pinjaman.jangka_waktu as jngk',
        )
            ->leftJoin('pemohons', 'pinjaman.id_pemohon', '=', 'pemohons.id')
            ->get();
        $pinjaman = Pinjaman::get();
        $pemohons = Pemohon::get();
        $pemohons = Pemohon::all();
        $pinjaman = Pinjaman::all();
        $pdf = Pdf::loadview('pinjaman.print', compact('pinjaman', 'pemohons'));
        return $pdf->download('laporan-pinjaman.pdf');
    }
}
