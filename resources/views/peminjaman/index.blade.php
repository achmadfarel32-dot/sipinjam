@extends('layouts.app')
@section('judul', 'Daftar Peminjaman')

@section('konten')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Daftar Peminjaman</h3>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">+ Catat Peminjaman</a>
  </div>

  <table class="table table-bordered table-striped bg-white align-middle">
    <thead class="table-light">
      <tr>
        <th>Alat</th><th>Peminjam</th><th>Jumlah</th><th>Tanggal Pinjam</th><th>Status</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($peminjaman as $p)
        <tr>
          <td>{{ $p->alat->nama }}</td>
          <td>{{ $p->nama_peminjam }}</td>
          <td>{{ $p->jumlah }}</td>
          <td>{{ $p->tanggal_pinjam->format('d-m-Y') }}</td>
          <td>
            @if ($p->status === 'dipinjam')
              <span class="badge text-bg-warning">dipinjam</span>
            @else
              <span class="badge text-bg-success">dikembalikan</span>
            @endif
          </td>
          <td>
            @if ($p->status === 'dipinjam')
              <form method="POST" action="{{ route('peminjaman.kembali', $p) }}" class="d-inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-sm btn-success">Kembalikan</button>
              </form>
            @endif
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center">Belum ada data peminjaman.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $peminjaman->links() }}
@endsection