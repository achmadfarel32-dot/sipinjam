<div class="mb-3">
  <label class="form-label">ISBN</label>
  <input name="isbn" class="form-control" value="{{ old('isbn', $buku->isbn ?? '') }}">
</div>
<div class="mb-3">
  <label class="form-label">Judul</label>
  <input name="judul" class="form-control" value="{{ old('judul', $buku->judul ?? '') }}">
</div>
<div class="mb-3">
  <label class="form-label">Penulis</label>
  <input name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis ?? '') }}">
</div>
<div class="mb-3">
  <label class="form-label">Penerbit (boleh kosong)</label>
  <input name="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit ?? '') }}">
</div>
<div class="mb-3">
  <label class="form-label">Tahun Terbit</label>
  <input name="tahun_terbit" type="number" class="form-control" value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}">
</div>