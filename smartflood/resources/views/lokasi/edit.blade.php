@extends('layouts.app')

@section('title','Edit Lokasi')

@section('content')

<h3>Edit Lokasi Sensor</h3>

<form method="POST" action="{{ route('lokasi.update',$lokasi->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Lokasi</label>
        <input type="text" name="nama_lokasi"
               value="{{ $lokasi->nama_lokasi }}"
               class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi"
                  class="form-control" required>{{ $lokasi->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
    <label>Kecamatan</label>
    <input type="text" name="kecamatan"
           value="{{ $lokasi->kecamatan }}"
           class="form-control" required>
</div>


    <button class="btn btn-primary">Update</button>
    <a href="/lokasi" class="btn btn-secondary">Kembali</a>
</form>

@endsection
