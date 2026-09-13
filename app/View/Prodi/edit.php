<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark"><h4>Edit Program Studi</h4></div>
            <div class="card-body">
                <form action="/S1-Akademik/public/prodi/update" method="POST">
                    <input type="hidden" name="id" value="<?= $prodi['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Kode Prodi</label>
                        <input type="text" name="kode" class="form-control" value="<?= htmlspecialchars($prodi['kode']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Prodi</label>
                        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($prodi['nama']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="/S1-Akademik/public/prodi" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>