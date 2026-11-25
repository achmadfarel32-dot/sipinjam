@extends('layouts.app')
@section('judul', 'Daftar Alat')

@section('konten')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Daftar Alat</h3>
    <a href="{{ route('alat.create') }}" class="btn btn-primary">+ Tambah Alat</a>
  </div>

  <form method="GET" action="{{ route('alat.index') }}" class="row g-2 mb-3">
    <div class="col-auto">
      <input name="cari" value="{{ $cari }}" class="form-control" placeholder="Cari nama alat">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-outline-primary">Cari</button>
    </div>
  </form>

  <table class="table table-bordered table-striped bg-white align-middle">
    <thead class="table-light">
      <tr>
        <th>Kode</th><th>Nama</th><th>Stok</th><th>Kondisi</th><th>Lokasi</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($alat as $a)
        <tr>
          <td>{{ $a->kode }}</td>
          <td>{{ $a->nama }}</td>
          <td>
            @if ($a->stok == 0)
              <span class="text-danger fw-bold">{{ $a->stok }}</span>
            @else
              {{ $a->stok }}
            @endif
          </td>
          <td>{{ $a->kondisi }}</td>
          <td>{{ $a->lokasi ?? '-' }}</td>
          <td>
            <a href="{{ route('alat.show', $a) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
            <a href="{{ route('alat.edit', $a) }}" class="btn btn-sm btn-warning">Ubah</a>

            <form method="POST" action="{{ route('alat.destroy', $a) }}"
                  class="d-inline"
                  onsubmit="return confirm('Hapus alat ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center">Belum ada data alat.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $alat->links() }}
@endsection