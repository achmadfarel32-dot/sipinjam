@extends('layouts.app')
@section('judul', 'Ubah Buku')

@section('konten')
  <h3>Ubah Buku</h3>

  <form method="POST" action="{{ route('buku.update', $buku) }}" class="card card-body">
    @csrf
    @method('PUT')
    @include('buku._form')
    <div>
      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
@endsection