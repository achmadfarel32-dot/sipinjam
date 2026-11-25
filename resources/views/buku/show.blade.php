@extends('layouts.app')
@section('judul', 'Detail Buku')

@section('konten')
  <h3>Detail Buku</h3>

  <table class="table table-bordered bg-white w-auto">
    <tr><th>ISBN</th><td>{{ $buku->isbn }}</td></tr>
    <tr><th>Judul</th><td>{{ $buku->judul }}</td></tr>
    <tr><th>Penulis</th><td>{{ $buku->penulis }}</td></tr>
    <tr><th>Penerbit</th><td>{{ $buku->penerbit ?? '-' }}</td></tr>
    <tr><th>Tahun Terbit</th><td>{{ $buku->tahun_terbit }}</td></tr>
  </table>

  <a href="{{ route('buku.edit', $buku) }}" class="btn btn-warning">Ubah</a>
  <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali ke daftar</a>
@endsection