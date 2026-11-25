<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('judul', 'Aplikasi Alat')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('alat.index') }}">SiPinjam</a>

    <ul class="navbar-nav me-auto">
      @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('alat.index') }}">Alat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('peminjaman.index') }}">Peminjaman</a>
        </li>
        <li class="nav-item">
  <a class="nav-link" href="{{ route('buku.index') }}">Buku</a>
</li>
      @endauth
    </ul>

    <ul class="navbar-nav align-items-center">
      @auth
        <li class="nav-item me-3">
          <span class="navbar-text">Halo, {{ auth()->user()->name }}</span>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">Keluar</button>
          </form>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Masuk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Daftar</a>
        </li>
      @endauth
    </ul>
  </div>
</nav>

  <div class="container pb-5">
    @if (session('sukses'))
      <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @yield('konten')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>