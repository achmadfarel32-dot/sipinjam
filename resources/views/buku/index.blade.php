@extends('layouts.app')
@section('judul', 'Daftar Buku')

@section('konten')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Daftar Buku</h3>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
  </div>

  <table class="table table-bordered table-striped bg-white align-middle">
    <thead class="table-light">
      <tr>
        <th>ISBN</th><th>Judul</th><th>Penulis</th><th>Penerbit</th><th>Tahun</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($buku as $b)
        <tr>
          <td>{{ $b->isbn }}</td>
          <td>{{ $b->judul }}</td>
          <td>{{ $b->penulis }}</td>
          <td>{{ $b->penerbit ?? '-' }}</td>
          <td>{{ $b->tahun_terbit }}</td>
          <td>
            <a href="{{ route('buku.show', $b) }}" class="btn btn-sm btn-outline-secondary">Detail</a>
            <a href="{{ route('buku.edit', $b) }}" class="btn btn-sm btn-warning">Ubah</a>

            <form method="POST" action="{{ route('buku.destroy', $b) }}"
                  class="d-inline"
                  onsubmit="return confirm('Hapus buku ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center">Belum ada data buku.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $buku->links() }}
@endsection