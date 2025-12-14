@extends('layouts.app')

@section('title', 'Laporan Banjir')

@section('content')
<h3 class="mb-4">Laporan Banjir</h3>

@if(auth()->user()->role !== 'admin')
<div class="card mb-4">
    <div class="card-body">
        <h5 class="mb-3">Tambah Laporan</h5>

        <form method="POST" action="/laporanbanjir">
            @csrf
            <div class="mb-3">
                <input type="number" name="ketinggian_air" class="form-control"
                       placeholder="Ketinggian Air (cm)" required>
            </div>
            <button class="btn btn-success">Kirim Laporan</button>
        </form>
    </div>
</div>
@endif

{{-- TABEL LAPORAN --}}
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="mb-3">Daftar Laporan</h5>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Ketinggian Air</th>
                    <th>Status Risiko</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporan as $lap)
                <tr>
                    <td>{{ $lap->ketinggian_air }} cm</td>
                    <td>
                        <span class="badge 
                        {{ $lap->status_risiko == 'Tinggi' ? 'bg-danger' : 
                           ($lap->status_risiko == 'Sedang' ? 'bg-warning' : 'bg-success') }}">
                            {{ $lap->status_risiko }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="hapus({{ $lap->id }})">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- AJAX HAPUS --}}
<script>
function hapus(id){
    if(!confirm('Yakin hapus laporan ini?')) return;

    fetch('/laporanbanjir/' + id,{
        method:'DELETE',
        headers:{
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        }
    }).then(() => location.reload());
}
</script>
@endsection
