<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('buku')?->id;   // null saat tambah data

        return [
            'isbn'         => ['required', 'string', 'max:20', Rule::unique('bukus', 'isbn')->ignore($id)],
            'judul'        => ['required', 'string', 'min:3', 'max:150'],
            'penulis'      => ['required', 'string', 'max:100'],
            'penerbit'     => ['nullable', 'string', 'max:100'],
            'tahun_terbit' => ['required', 'integer', 'between:1900,' . date('Y')],
        ];
    }

    public function messages(): array
    {
        return [
            'isbn.required'         => 'ISBN wajib diisi.',
            'isbn.unique'           => 'ISBN sudah terdaftar.',
            'isbn.max'              => 'ISBN maksimal 20 karakter.',
            'judul.required'        => 'Judul buku wajib diisi.',
            'judul.min'             => 'Judul buku minimal 3 karakter.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer'  => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.between'  => 'Tahun terbit harus antara 1900 dan tahun ini.',
        ];
    }
}