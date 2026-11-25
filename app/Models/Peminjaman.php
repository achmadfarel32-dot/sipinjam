<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = ['alat_id', 'nama_peminjam', 'jumlah', 'tanggal_pinjam', 'status'];

    protected function casts(): array
    {
        return ['tanggal_pinjam' => 'date'];
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }
}