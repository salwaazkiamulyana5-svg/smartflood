@extends('layouts.app')

@section('title','Lokasi Sensor')

@section('content')

<h3 class="mb-3">Lokasi Sensor</h3>

<a href="{{ route('lokasi.create') }}" class="btn btn-success mb-3">
    + Tambah Lokasi
</a>

<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>Nama Lokasi</th>
            <th>Deskripsi</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lokasi as $l)
        <tr>
            <td>{{ $l->nama_lokasi }}</td>
            <td>{{ $l->deskripsi }}</td>
            <td>
                <a href="{{ route('lokasi.edit',$l->id) }}" class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('lokasi.destroy',$l->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus data?')"
                            class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
