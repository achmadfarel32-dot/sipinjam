@extends('layouts.app')
@section('judul', 'Tambah Alat')

@section('konten')
  <h3>Tambah Alat</h3>

  <form method="POST" action="{{ route('alat.store') }}" class="card card-body">
    @csrf
    <div class="mb-3">
      <label class="form-label">Kode</label>
      <input name="kode" class="form-control" value="{{ old('kode') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input name="nama" class="form-control" value="{{ old('nama') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Stok</label>
      <input name="stok" type="number" class="form-control" value="{{ old('stok') }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Kondisi</label>
      <select name="kondisi" class="form-select">
        <option value="baik">baik</option>
        <option value="rusak ringan">rusak ringan</option>
        <option value="rusak berat">rusak berat</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Lokasi</label>
      <input name="lokasi" class="form-control" value="{{ old('lokasi') }}">
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('alat.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
@endsection