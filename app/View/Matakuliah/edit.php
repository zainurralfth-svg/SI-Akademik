<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark"><h4>Edit Mata Kuliah</h4></div>
            <div class="card-body">
                <form action="/S1-Akademik/public/matakuliah/update" method="POST">
                    <input type="hidden" name="id" value="<?= $matakuliah['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Kode MK</label>
                        <input type="text" name="kode" class="form-control" value="<?= htmlspecialchars($matakuliah['kode']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($matakuliah['nama']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="number" name="sks" class="form-control" value="<?= $matakuliah['sks']; ?>" min="1" max="6" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-select">
                            <?php foreach ($data_prodi as $p): ?>
                                <option value="<?= $p['id']; ?>" <?= $p['id'] == $matakuliah['prodi_id'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($p['nama']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="/S1-Akademik/public/matakuliah" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>