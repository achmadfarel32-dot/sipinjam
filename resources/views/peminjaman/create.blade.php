@extends('layouts.app')
@section('judul', 'Catat Peminjaman')

@section('konten')
  <h3>Catat Peminjaman</h3>

  <form method="POST" action="{{ route('peminjaman.store') }}" class="card card-body">
    @csrf
    <div class="mb-3">
      <label class="form-label">Alat</label>
      <select name="alat_id" class="form-select">
        <option value="">-- pilih alat --</option>
        @foreach ($alat as $a)
          <option value="{{ $a->id }}" {{ old('alat_id') == $a->id ? 'selected' : '' }}>
            {{ $a->nama }} (stok: {{ $a->stok }})
          </option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Nama Peminjam</label>
      <input name="nama_peminjam" class="form-control" value="{{ old('nama_peminjam') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Jumlah</label>
      <input name="jumlah" type="number" class="form-control" value="{{ old('jumlah', 1) }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Tanggal Pinjam</label>
      <input name="tanggal_pinjam" type="date" class="form-control" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}">
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
@endsection