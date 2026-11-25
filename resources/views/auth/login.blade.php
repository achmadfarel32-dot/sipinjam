@extends('layouts.app')
@section('judul', 'Masuk')

@section('konten')
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">Masuk</div>
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" name="ingat" value="1" class="form-check-input" id="ingat">
              <label class="form-check-label" for="ingat">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
          </form>
          <p class="mt-3 mb-0 text-center">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection