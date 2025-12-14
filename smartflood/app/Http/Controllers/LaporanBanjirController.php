<?php

namespace App\Http\Controllers;

use App\Models\LaporanBanjir;
use Illuminate\Http\Request;

class LaporanBanjirController extends Controller
{ 
    public function index()
    {
        $laporan = auth()->user()->role === 'admin'
            ? LaporanBanjir::latest()->get()
            : LaporanBanjir::where('user_id', auth()->id())->latest()->get();

        return view('laporan.list', compact('laporan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ketinggian_air' => 'required|numeric'
        ]);

        $status = $request->ketinggian_air >= 120 ? 'Tinggi'
                : ($request->ketinggian_air >= 60 ? 'Sedang' : 'Rendah');

        LaporanBanjir::create([
            'user_id' => auth()->id(),
            'ketinggian_air' => $request->ketinggian_air,
            'status_risiko' => $status
        ]);

        return back()->with('success','Laporan berhasil ditambahkan');
    }

    public function destroy(LaporanBanjir $laporanBanjir)
    {
        $laporanBanjir->delete();

        return back()->with('success','Laporan berhasil dihapus');
    }
}
