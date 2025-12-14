<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Aplikasi Banjir')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>

            @if(auth()->user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link" href="/lokasi">Lokasi Sensor</a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="/laporanbanjir">Laporan Banjir</a>
            </li>
        </ul>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-light btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
