<div class="container">
    <h2><?= $data['judul']; ?></h2>

    <form action="<?= BASEURL; ?>/user/tambah" method="post" class="card p-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <button type="submit" class="btn btn-primary">Simpan User Baru</button>
        </div>
    </form>
</div>