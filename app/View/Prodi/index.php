<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Program Studi</h1>
    <a href="/S1-Akademik/public/prodi/create" class="btn btn-primary">+ Tambah Prodi</a>
</div>
<table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Kode Prodi</th>
            <th>Nama Prodi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_prodi as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']); ?></td>
            <td><?= htmlspecialchars($p['kode']); ?></td>
            <td><?= htmlspecialchars($p['nama']); ?></td>
            <td>
                <a href="/S1-Akademik/public/prodi/edit?id=<?= $p['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/S1-Akademik/public/prodi/delete?id=<?= $p['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus prodi ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>