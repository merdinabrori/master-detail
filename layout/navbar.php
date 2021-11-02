<nav class="m-0 p-2 navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand"><i class="fas fa-fw fa-user-tie"></i> Daftar Dosen Wali</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#buka_menu" aria-controls="buka_menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex flex-row-reverse" id="buka_menu">
            <ul class="nav text-light">
                <li class="nav-item"><a href="<?= BASE_URL; ?>" class="nav-link text-light"><i class="fas fa-fw fa-table"></i> Tabel</a></li>
                <li class="nav-item"><a href="<?= BASE_URL; ?>chart/batang.php" class="nav-link text-light"><i class="fas fa-fw fa-chart-bar"></i> Grafik Batang</a></li>
                <li class="nav-item"><a href="<?= BASE_URL; ?>chart/lingkaran.php" class="nav-link text-light"><i class="fas fa-fw fa-chart-pie"></i> Grafik Lingkaran</a></li>
            </ul>
        </div>
    </div>
</nav>