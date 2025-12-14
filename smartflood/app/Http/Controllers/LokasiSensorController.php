<?php

namespace App\Http\Controllers;

use App\Models\LokasiSensor;
use Illuminate\Http\Request;

class LokasiSensorController extends Controller
{
    public function index()
    {
        $lokasi = LokasiSensor::all();
        return view('lokasi.index', compact('lokasi'));
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'kecamatan' => 'required',
            'deskripsi' => 'required',
        ]);

        LokasiSensor::create([
            'nama_lokasi' => $request->nama_lokasi,
            'kecamatan' => $request->kecamatan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/lokasi')->with('success','Data berhasil ditambahkan');
    }

    public function edit(LokasiSensor $lokasiSensor)
    {
        return view('lokasi.edit', [
            'lokasi' => $lokasiSensor
        ]);
    }

    public function update(Request $request, LokasiSensor $lokasiSensor)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'kecamatan' => 'required',
            'alamat' => 'required',
        ]);

        $lokasiSensor->update([
            'nama_lokasi' => $request->nama_lokasi,
            'kecamatan' => $request->kecamatan,
            'alamat' => $request->alamat,
        ]);

        return redirect('/lokasi')->with('success','Data berhasil diperbarui');
    }

    public function destroy(LokasiSensor $lokasiSensor)
    {
        $lokasiSensor->delete();
        return back()->with('success','Data berhasil dihapus');
    }
}
