<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Mata Kuliah</h1>
    <a href="/S1-Akademik/public/matakuliah/create" class="btn btn-primary">+ Tambah Mata Kuliah</a>
</div>
<table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Program Studi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_mk as $mk): ?>
        <tr>
            <td><?= htmlspecialchars($mk['kode']); ?></td>
            <td><?= htmlspecialchars($mk['nama']); ?></td>
            <td><?= htmlspecialchars($mk['sks']); ?></td>
            <td><?= htmlspecialchars($mk['prodi_nama']); ?></td>
            <td>
                <a href="/S1-Akademik/public/matakuliah/edit?id=<?= $mk['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="/S1-Akademik/public/matakuliah/delete?id=<?= $mk['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus mata kuliah ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>