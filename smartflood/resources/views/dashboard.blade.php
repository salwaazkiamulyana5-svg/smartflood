@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card bg-primary text-white shadow">
            <div class="card-body">
                <h5>Total Laporan</h5>
                <h2>{{ \App\Models\LaporanBanjir::count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white shadow">
            <div class="card-body">
                <h5>Lokasi Sensor</h5>
                <h2>{{ \App\Models\LokasiSensor::count() }}</h2>
            </div>
        </div>
    </div>
</div>

@endsection
