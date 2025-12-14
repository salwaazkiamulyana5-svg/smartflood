@extends('layouts.app')

@section('title','Tambah Lokasi')

@section('content')

<h3>Tambah Lokasi Sensor</h3>

<form method="POST" action="{{ route('lokasi.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama Lokasi</label>
        <input type="text" name="nama_lokasi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kecamatan</label>
        <input type="text" name="kecamatan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="/lokasi" class="btn btn-secondary">Kembali</a>
</form>

@endsection
