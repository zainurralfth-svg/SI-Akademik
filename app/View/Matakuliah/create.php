<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white"><h4>Tambah Mata Kuliah</h4></div>
            <div class="card-body">
                <form action="/S1-Akademik/public/matakuliah/store" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Kode MK</label>
                        <input type="text" name="kode" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="number" name="sks" class="form-control" min="1" max="6" value="3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-select">
                            <?php foreach ($data_prodi as $p): ?>
                                <option value="<?= $p['id']; ?>"><?= htmlspecialchars($p['nama']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="/S1-Akademik/public/matakuliah" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>