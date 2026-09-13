<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4>Edit Data Mahasiswa</h4>
            </div>
            <div class="card-body">
                <form action="/S1-Akademik/public/mahasiswa/update" method="POST">
                    <!-- Kirim ID secara tersembunyi (hidden) untuk identifikasi data yang di-update -->
                    <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($mahasiswa['nim']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($mahasiswa['nama']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($mahasiswa['email']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi_id" class="form-select">
                            <?php foreach ($data_prodi as $p): ?>
                                <option value="<?= $p['id']; ?>" <?= $p['id'] == $mahasiswa['prodi_id'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($p['nama']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun Angkatan</label>
                        <input type="number" name="angkatan" class="form-control" value="<?= htmlspecialchars($mahasiswa['angkatan']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="aktif" <?= $mahasiswa['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                            <option value="cuti" <?= $mahasiswa['status'] == 'cuti' ? 'selected' : ''; ?>>Cuti</option>
                            <option value="lulus" <?= $mahasiswa['status'] == 'lulus' ? 'selected' : ''; ?>>Lulus</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Update Data</button>
                    <a href="/S1-Akademik/public/mahasiswa" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>