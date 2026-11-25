@extends('layouts.app')
@section('judul', 'Detail Alat')

@section('konten')
  <h3>Detail Alat</h3>

  <table class="table table-bordered bg-white w-auto">
    <tr><th>Kode</th><td>{{ $alat->kode }}</td></tr>
    <tr><th>Nama</th><td>{{ $alat->nama }}</td></tr>
    <tr><th>Stok</th><td>{{ $alat->stok }}</td></tr>
    <tr><th>Kondisi</th><td>{{ $alat->kondisi }}</td></tr>
    <tr><th>Lokasi</th><td>{{ $alat->lokasi ?? '-' }}</td></tr>
  </table>

  <a href="{{ route('alat.edit', $alat) }}" class="btn btn-warning">Ubah</a>
  <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali ke daftar</a>
    <h5 class="mt-4">Riwayat Peminjaman</h5>
  <table class="table table-bordered bg-white">
    <tr><th>Peminjam</th><th>Jumlah</th><th>Tanggal</th><th>Status</th></tr>
    @forelse ($alat->peminjaman as $p)
      <tr>
        <td>{{ $p->nama_peminjam }}</td>
        <td>{{ $p->jumlah }}</td>
        <td>{{ $p->tanggal_pinjam->format('d-m-Y') }}</td>
        <td>{{ $p->status }}</td>
      </tr>
    @empty
      <tr><td colspan="4" class="text-center">Belum pernah dipinjam.</td></tr>
    @endforelse
  </table>
@endsection