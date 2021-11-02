<?php

// url & path dasar
define("BASE_URL", "http://localhost/master-detail/");
define("ROOT_PATH", realpath(dirname(__FILE__)));

function tanggal($date)
{
    $date = date("Y-m-j", strtotime($date));
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $date);

    // variabel pecahkan index ke-0 = tanggal
    // variabel pecahkan index ke-1 = bulan
    // variabel pecahkan index ke-2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
