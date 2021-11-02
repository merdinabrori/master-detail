<?php
require 'conn.php';
require 'fungsi.php';
$npm = $_GET['npm'];
$list_bimbingan = getBimbingan($npm);
$mahasiswa = getMhs(false, $npm)[0];
// var_dump($mahasiswa);
// die;

?>
<!DOCTYPE html>
<html>

<head>
    <title>Master - Detail | Studi kasus Dosen Wali</title>
    <!-- <link rel="stylesheet" href="style.css">-->
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
                            <h5 style="padding-top: 1rem;"><i class="fas fa-fw fa-paperclip"></i> Mahasiswa : <?= ucwords($mahasiswa['nama']); ?></h5>
                            <h5 style="padding-top: 1rem;"><i class="fas fa-fw fa-paperclip"></i> NPM : <?= ucwords($mahasiswa['npm']); ?></h5>
                            <h5 style="padding-top: 1rem;"><i class="fas fa-fw fa-paperclip"></i> Fakultas/Prodi : <?= ucwords($mahasiswa['fakultas'] . '/' . $mahasiswa['prodi']); ?></h5>
                            <table class="table table-md table-responsive table-hover shadow">
                                <thead class="bg-dark text-light fw-bold shadow">
                                    <th>No.</th>
                                    <th>Bimbingan</th>
                                    <th>Waktu</th>
                                </thead>
                                <tbody class="ps-2">
                                    <?php $i = 1;
                                    foreach ($list_bimbingan as $row) : ?>
                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><a class="text-decoration-none text-primary" href="detail/detail-bimbingan.php?bimbingan=<?= $row['id']; ?>"><?= ucwords(getJenisBimbingan($row['id_bimbingan'])); ?></a></td>
                                            <td><?= ucwords(Tanggal($row['waktu'])); ?></td>
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