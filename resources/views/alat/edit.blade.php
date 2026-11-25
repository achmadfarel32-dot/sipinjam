@extends('layouts.app')
@section('judul', 'Ubah Alat')

@section('konten')
  <h3>Ubah Alat</h3>

  <form method="POST" action="{{ route('alat.update', $alat) }}" class="card card-body">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label class="form-label">Kode</label>
      <input name="kode" class="form-control" value="{{ old('kode', $alat->kode) }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input name="nama" class="form-control" va    lue="{{ old('nama', $alat->nama) }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Stok</label>
      <input name="stok" type="number" class="form-control" value="{{ old('stok', $alat->stok) }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Kondisi</label>
      <select name="kondisi" class="form-select">
        @foreach (['baik', 'rusak ringan', 'rusak berat'] as $k)
          <option value="{{ $k }}" {{ old('kondisi', $alat->kondisi) == $k ? 'selected' : '' }}>{{ $k }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Lokasi</label>
      <input name="lokasi" class="form-control" value="{{ old('lokasi', $alat->lokasi) }}">
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('alat.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
@endsection