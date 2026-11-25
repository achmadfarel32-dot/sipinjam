<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('judul')->paginate(10);
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(BukuRequest $request)
    {
        Buku::create($request->validated());
        return redirect()->route('buku.index')
            ->with('sukses', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(BukuRequest $request, Buku $buku)
    {
        $buku->update($request->validated());
        return redirect()->route('buku.index')
            ->with('sukses', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')
            ->with('sukses', 'Buku berhasil dihapus.');
    }
}