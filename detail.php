<?php
require 'conn.php';
require 'fungsi.php';
$nidnWali = $_GET['nidn'];
$mahasiswa = getMhs($nidnWali);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Master - Detail | Studi kasus Dosen Wali</title>
    <!-- <link rel="stylesheet" href="style.css">-->
    <?php require 'header.php'; ?>
</head>

<body style="<?= $Theme_Body;
                $Load_BG; ?>">
    <header>
        <?php require 'navbar.php' ?>
    </header>
    <main class="py-5" style="<?= $Load_BG; ?>">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card rounded" style="<?= $Load_BG; ?>">
                        <div class="card-body">
                            <h5 style="padding-top: 1rem;"><i class="fas fa-fw fa-paperclip"></i> Dosen Wali : <?= ucwords(getNamaDsn($nidnWali)); ?></h5>
                            <table class="table table-md table-responsive table-hover shadow">
                                <thead class="bg-dark text-light fw-bold shadow">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
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
                                    foreach ($mahasiswa as $row) : ?>
                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><a class="text-decoration-none text-primary" href="bimbingan.php?npm=<?= $row['npm']; ?>"><?= ucwords($row['nama']); ?></a></td>
                                            <td><?= ucwords($row['npm']); ?></td>
                                            <td><?= ucwords($row['tempat_lahir']); ?></td>
                                            <td><?= ucwords(Tanggal($row['tgl_lahir'])); ?></td>
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
    <?php require 'footer.php'; ?>
</body>

</html>