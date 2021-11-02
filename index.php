<?php
require 'conn.php';
require 'fungsi.php';
$dosen = getAllData('dosen');

// var_dump($_SERVER);
// die;

?>
<!DOCTYPE html>
<html>

<head>
    <title>Master - Detail | Studi kasus Dosen Wali</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <?php require ROOT_PATH . '/layout/header.php'; ?>
</head>

<body style="<?= $Theme_Body;
                $Load_BG; ?>">
    <header>
        <?php require ROOT_PATH . '/layout/navbar.php' ?>
    </header>
    <main class="py-5" style="<?= $Load_BG; ?>">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card rounded" style="<?= $Load_BG; ?>">
                        <div class="card-body">
                            <table class="table table-md table-responsive table-hover shadow">
                                <thead class="bg-dark text-light fw-bold shadow">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIDN</th>
                                    <th>Tempat Kelahiran</th>
                                    <th>Tanggal Kelahiran</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Fakultas</th>
                                    <th>Program Studi</th>
                                    <th>Agama</th>
                                </thead>
                                <tbody class="ps-2">
                                    <?php $i = 1;
                                    foreach ($dosen as $row) : ?>
                                        <tr>
                                            <td class="text-center "><?= $i; ?></td>
                                            <td><a class="text-decoration-none text-primary" href="<?= BASE_URL; ?>detail/detail.php?nidn=<?= $row['nidn']; ?>"><?= ucwords($row['nama']); ?></a></td>
                                            <td><?= ucwords($row['nidn']); ?></td>
                                            <td><?= ucwords($row['tempat_lahir']); ?></td>
                                            <td><?= ucwords(tanggal($row['tgl_lahir'])); ?></td>
                                            <td><?= ($row['jenis_kelamin'] == 0) ? 'Perempuan' : 'Laki-Laki'; ?></td>
                                            <td><?= ucwords($row['alamat']); ?></td>
                                            <td><?= ucwords($row['fakultas']); ?></td>
                                            <td><?= ucwords($row['prodi']); ?></td>
                                            <td><?= ucwords($row['agama']); ?></td>
                                        </tr>
                                    <?php $i += 1;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require ROOT_PATH . '/layout/footer.php'; ?>
</body>

</html>