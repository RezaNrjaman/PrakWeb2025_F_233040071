<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h1>Daftar Pengguna</h1>

        <!-- Tabel untuk menampilkan daftar semua pengguna -->
        <table class="user-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <!-- Loop untuk menampilkan setiap pengguna -->
                <?php foreach ($users as $user): ?>
                    <tr>
                        <!-- Menampilkan nama pengguna dengan sanitasi HTML -->
                        <td><?= htmlspecialchars($user['name']); ?></td>

                        <!-- Menampilkan email dengan sanitasi HTML -->
                        <td><?= htmlspecialchars($user['email']); ?></td>

                        <td><a href="<?= BASEURL; ?>/user/edit/<?= $user['id']; ?>" class="badge bg-success text-decoration-none">Edit</a></td>
                        <td><a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="badge bg-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a></td>
                        <td><a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="badge bg-primary text-decoration-none">Detail</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <a type="button" href="<?= BASEURL; ?>/user/tambah" class="btn btn-primary mb-3">
            Tambah User
        </a>

        <?php Flasher::flash(); ?>

    </div>
</body>

</html>