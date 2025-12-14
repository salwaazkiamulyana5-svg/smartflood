@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h3 class="mb-4">Dashboard Admin</h3>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Total Laporan</h5>
                <h1>{{ $totalLaporan }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm border-danger">
            <div class="card-body text-center">
                <h5 class="text-danger">Risiko Tinggi</h5>
                <h1 class="text-danger">{{ $risikoTinggi }}</h1>
            </div>
        </div>
    </div>
</div>

<a href="/laporanbanjir" class="btn btn-primary mt-4">Kelola Laporan</a>
@endsection
