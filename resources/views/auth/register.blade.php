@extends('layouts.app')
@section('judul', 'Daftar')

@section('konten')
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">Buat Akun</div>
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input name="name" class="form-control" value="{{ old('name') }}" autofocus>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Ulangi Password</label>
              <input type="password" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Daftar</button>
          </form>
          <p class="mt-3 mb-0 text-center">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection