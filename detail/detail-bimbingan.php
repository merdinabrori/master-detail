<?php
require '../fungsi.php';
require ROOT_PATH . '/conn.php';
$detail_bimbingan = getBimbingan(false, false, $_GET['bimbingan'])[0];
$mahasiswa = getMhs(false, $detail_bimbingan['npm_mhs'])[0];
// var_dump($detail_bimbingan);
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
                            <h5 style="padding-top: 1rem;"><i class="fas fa-fw fa-paperclip"></i>Detail Bimbingan</h5>
                            <p style="padding-top: 0.5rem;">Nama Mahasiswa : <?= ucwords($mahasiswa['nama']); ?></p>
                            <p style="padding-top: -0.5rem;">NPM : <?= ucwords($mahasiswa['npm']); ?></p>
                            <p style="padding-top: -0.5rem;">Fakultas/Prodi : <?= ucwords($mahasiswa['fakultas'] . '/' . $mahasiswa['prodi']); ?></p>
                            <p style="padding-top: -0.5rem;">Bahasan : <?= strtoupper(getJenisBimbingan($detail_bimbingan['id_bimbingan'])); ?></p>
                            <p style="padding-top: -0.5rem;">Dosen Wali : <?= ucwords(getNamaDsn($detail_bimbingan['nidn_dosen'])); ?></p>
                            <p style="padding-top: -0.5rem;">Waktu : <?= ucwords(tanggal($detail_bimbingan['waktu'])); ?></p>
                            <p style="padding-top: -0.5rem;">Tempat : <?= ucwords($detail_bimbingan['tempat']); ?></p>
                            <p style="padding-top: -0.5rem;">Isi : <?= ucwords($detail_bimbingan['isi']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require ROOT_PATH . '/layout/footer.php'; ?>
</body>

</html>