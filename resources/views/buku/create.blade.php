@extends('layouts.app')
@section('judul', 'Tambah Buku')

@section('konten')
  <h3>Tambah Buku</h3>

  <form method="POST" action="{{ route('buku.store') }}" class="card card-body">
    @csrf
    @include('buku._form')
    <div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
@endsection