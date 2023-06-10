<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Pemohon;
use Barryvdh\DomPDF\Facade\Pdf;


class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemohons = Pemohon::get();
        $riwayatpengajuan = Riwayat::select(
            'riwayat_pengajuan.id as id',

            'riwayat_pengajuan.id_pemohon as idpem',
            'pemohons.nama as nama',

            'riwayat_pengajuan.tanggal_pengajuan as tgl',
            'riwayat_pengajuan.status_pengajuan as status',
        )
            ->leftJoin('pemohons', 'riwayat_pengajuan.id_pemohon', '=', 'pemohons.id')
            ->get();

        return view('riwayat_pengajuan.index', compact('riwayatpengajuan', 'pemohons'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pemohon $pemohons)
    {
        $pemohons = Pemohon::all();

        return view('riwayat_pengajuan.create', compact('pemohons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pemohon' => 'required',
            'tanggal_pengajuan' => 'required',
            'status_pengajuan' => 'required',
        ]);

        Riwayat::create($request->all());

        return redirect()->route('riwayats.index')
            ->with('success', 'Riwayat pengajuan berhasil ditambahkan.');
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
        $riwayatpengajuan = Riwayat::findOrFail($id);
        $pemohons = Pemohon::all();
        return view('riwayat_pengajuan.edit', compact('riwayatpengajuan', 'pemohons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Riwayat $riwayatpengajuan, $id)
    {
        $request->validate([
            'id_pemohon' => 'required',
            'tanggal_pengajuan' => 'required',
            'status_pengajuan' => 'required',
        ]);
        $riwayatpengajuan = Riwayat::findOrFail($id);
        $riwayatpengajuan->update($request->all());

        return redirect()->route('riwayats.index')
            ->with('success', 'Riwayat pengajuan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riwayat $riwayatpengajuan, $id)
    {
        $riwayatpengajuan = Riwayat::findOrFail($id);
        $riwayatpengajuan->delete();

        return redirect()->route('riwayats.index')
            ->with('success', 'Riwayat pengajuan berhasil dihapus.');
    }
    public function print()
    {
        $pemohons = Pemohon::get();
        $riwayatpengajuan = Riwayat::select(
            'riwayat_pengajuan.id as id',

            'riwayat_pengajuan.id_pemohon as idpem',
            'pemohons.nama as nama',

            'riwayat_pengajuan.tanggal_pengajuan as tgl',
            'riwayat_pengajuan.status_pengajuan as status',
        )
            ->leftJoin('pemohons', 'riwayat_pengajuan.id_pemohon', '=', 'pemohons.id')
            ->get();
        $pemohons = Pemohon::all();
        $pdf = Pdf::loadview('riwayat_pengajuan.print', compact('pemohons', 'riwayatpengajuan'));
        return $pdf->download('laporan-riwayat-pengajuan.pdf');
    }
}
