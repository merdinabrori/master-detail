<?php
require 'conn.php';
$nidnWali = $_GET['nidn'];
$mhs = getMhs($nidnWali, 'id, nama');
$mahasiswa = [];

foreach ($mhs as $row) {
    $mahasiswa[] =
        array(
            "nama" => ucwords($row['nama']),
            "jumlah" => 1
        );
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Master - Detail | Studi kasus Dosen Wali</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <?php require 'header.php' ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <div class="card rounded shadow" style="<?= $Load_BG; ?>">
                        <div class="card-body">
                            <h5><i class="fas fa-fw fa-paperclip"></i> Dosen Wali : <?= ucwords(getNamaDsn($nidnWali)); ?></h5>
                            <div class="border" style="min-height:80vh;">
                                <div class="chartCard">
                                    <div class="chartBox col-md-10 mx-auto">
                                        <canvas id="myChart" class=""></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require 'footer.php' ?>
    <script>
        // pass variable
        // var namaDosen = 
        // setup 
        const data = {
            datasets: [{
                label: 'Jumlah Mahasiswa Bimbingan',
                data: <?= json_encode($mahasiswa); ?>,
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                ],
                borderWidth: 1
            }]
        };

        // config 
        const config = {
            type: 'bar',
            data,
            options: {
                parsing: {
                    xAxisKey: 'nama',
                    yAxisKey: 'jumlah'
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        //pin pointing chart
        const ctx = document.getElementById('myChart');
        // render init block
        const myChart = new Chart(
            ctx,
            config
        );
    </script>
</body>

</html>