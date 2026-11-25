<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('alat')->latest()->paginate(10);
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $alat = Alat::where('stok', '>', 0)->orderBy('nama')->get();
        return view('peminjaman.create', compact('alat'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'alat_id'        => ['required', 'exists:alats,id'],
            'nama_peminjam'  => ['required', 'string', 'max:100'],
            'jumlah'         => ['required', 'integer', 'min:1'],
            'tanggal_pinjam' => ['required', 'date'],
        ], [
            'alat_id.required'       => 'Pilih alat terlebih dahulu.',
            'nama_peminjam.required' => 'Nama peminjam wajib diisi.',
            'jumlah.required'        => 'Jumlah wajib diisi.',
            'jumlah.min'             => 'Jumlah minimal 1.',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi.',
        ]);

        $alat = Alat::findOrFail($data['alat_id']);

        if ($data['jumlah'] > $alat->stok) {
            return back()->withInput()
                ->withErrors(['jumlah' => 'Stok tidak cukup. Sisa stok: ' . $alat->stok]);
        }

        DB::transaction(function () use ($data, $alat) {
            Peminjaman::create($data);
            $alat->decrement('stok', $data['jumlah']);
        });

        return redirect()->route('peminjaman.index')
            ->with('sukses', 'Peminjaman berhasil dicatat.');
    }

    public function kembalikan(Peminjaman $peminjaman)
    {
        if ($peminjaman->status === 'dipinjam') {
            DB::transaction(function () use ($peminjaman) {
                $peminjaman->update(['status' => 'dikembalikan']);
                $peminjaman->alat->increment('stok', $peminjaman->jumlah);
            });
        }

        return redirect()->route('peminjaman.index')
            ->with('sukses', 'Alat sudah dikembalikan.');
    }
}