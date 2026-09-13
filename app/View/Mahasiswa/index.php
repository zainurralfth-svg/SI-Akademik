<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Mahasiswa</h1>
    <a href="/S1-Akademik/public/mahasiswa/create" class="btn btn-primary">+ Tambah Mahasiswa</a>
</div>

<!-- Form Pencarian (Tugas Mandiri) -->
<form action="/S1-Akademik/public/mahasiswa" method="GET" class="input-group mb-3">
    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Nama atau NIM..." value="<?= htmlspecialchars($_GET['search'] ?? ''); ?>">
    <button class="btn btn-outline-secondary" type="submit">Cari</button>
    <?php if (!empty($_GET['search'])): ?>
        <a href="/S1-Akademik/public/mahasiswa" class="btn btn-outline-danger">Reset</a>
    <?php endif; ?>
</form>

<table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($data_mahasiswa)): ?>
            <tr><td colspan="7" class="text-center">Data tidak ditemukan.</td></tr>
        <?php else: ?>
            <?php foreach ($data_mahasiswa as $mhs): ?>
            <tr>
                <td><?= htmlspecialchars($mhs['nim']); ?></td>
                <td><?= htmlspecialchars($mhs['nama']); ?></td>
                <td><?= htmlspecialchars($mhs['email']); ?></td>
                <td><?= htmlspecialchars($mhs['prodi_nama']); ?></td>
                <td><?= htmlspecialchars($mhs['angkatan']); ?></td>
                <td><span class="badge bg-success"><?= htmlspecialchars($mhs['status']); ?></span></td>
                <td>
                    <a href="/S1-Akademik/public/mahasiswa/edit?id=<?= $mhs['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <!-- Konfirmasi JavaScript sebelum hapus -->
                    <a href="/S1-Akademik/public/mahasiswa/delete?id=<?= $mhs['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data mahasiswa ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>