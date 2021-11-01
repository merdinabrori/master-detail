<?php
require 'conn.php';
$dosen = getAllData('dosen', 'id, nama, nidn');
$namaDosen = [];
$jumlahMhs = [];
$nidn = [];

foreach ($dosen as $row) {
    $jumlahMhs[] = count(getMhs($row['nidn']));
    $namaDosen[] = $row['nama'];
    $nidn[] = $row['nidn'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Master - Detail | Studi kasus Dosen Wali</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <?php require 'header.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                            <div class="border" style="min-height:80vh;">
                                <div class="chartCard">
                                    <div class="chartBox col-md-10 mx-auto" style="max-width: 700px;">
                                        <canvas id="pieChart" class=""></canvas>
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
</body>
<script>
    // pie Chart
    const data = {
        labels: <?= json_encode($namaDosen); ?>,
        datasets: [{
            label: '# of Votes',
            data: <?= json_encode($jumlahMhs); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    };

    // config 
    const configPie = {
        type: 'pie',
        data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    //membuat chart
    const ctxPie = document.getElementById('pieChart');
    // render init block
    const pieChart = new Chart(
        ctxPie,
        configPie
    );

    function clickHandler(click) {
        const points = pieChart.getElementsAtEventForMode(click, 'nearest', {
            intersect: true
        }, true);

        // key untuk dikirim pada link secara GET
        const nidn = <?= json_encode($nidn); ?>;
        if (points.length) {
            const firstPoint = points[0];
            console.log(firstPoint.index);

            // membuka link
            window.location.href = 'detailLingkaran.php?nidn=' + nidn[firstPoint.index];
        }
    }
    ctxPie.onclick = clickHandler;
</script>

</html>