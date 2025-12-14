@extends('layouts.app')

@section('title','Dashboard User')

@section('content')

<h3 class="fw-bold text-primary mb-4">
    Dashboard User
</h3>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Laporan Anda</h6>
                <h1 class="fw-bold text-success">{{ $laporanUser }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <a href="/laporanbanjir" class="btn btn-primary">
        Lihat Laporan Saya
    </a>
</div>

@endsection
