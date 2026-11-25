<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Http\Requests\StoreAlatRequest;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $data = $request->validate([
        'cari' => ['nullable', 'string', 'max:50'],
    ]);
    $cari = $data['cari'] ?? null;

    $alat = Alat::when($cari, function ($query) use ($cari) {
            $query->where('nama', 'like', '%' . $cari . '%');
        })
        ->orderBy('kode')
        ->paginate(10)
        ->withQueryString();

    return view('alat.index', compact('alat', 'cari'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('alat.create');
}

public function store(StoreAlatRequest $request)
{
    Alat::create($request->validated());
    return redirect()->route('alat.index')
        ->with('sukses', 'Alat berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Alat $alat)
{
    return view('alat.show', compact('alat'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alat $alat)
{
    return view('alat.edit', compact('alat'));
}

public function update(StoreAlatRequest $request, Alat $alat)
{
    $alat->update($request->validated());
    return redirect()->route('alat.index')
        ->with('sukses', 'Alat berhasil diperbarui.');
}

public function destroy(Alat $alat)
{
    $alat->delete();
    return redirect()->route('alat.index')
        ->with('sukses', 'Alat berhasil dihapus.');
}
}
