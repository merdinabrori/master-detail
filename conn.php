<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db       = 'master-detail';

$conn = mysqli_connect($hostname, $username, $password, $db);

function getAllData($tabel, $kolom = false)
{
    global $conn;
    if ($kolom == false) {
        $query = "SELECT * FROM $tabel";
    } else {
        $query = "SELECT $kolom FROM $tabel";
    }

    $hasil = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }

    return $rows;
}

function getNamaDsn($nidn)
{
    global $conn;
    $query = "SELECT nama FROM dosen WHERE nidn = '$nidn'";

    $hasil = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($hasil)["nama"];
}

function getMhs($nidn = false, $npm = false, $kolom = false)
{
    global $conn;
    if ($kolom == false) {
        $query = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
        if ($nidn != false) {
            $query = "SELECT * FROM mahasiswa WHERE nidn_wali = '$nidn'";
        }
    } else {
        $query = "SELECT $kolom FROM mahasiswa WHERE npm = '$npm'";
        if ($nidn != false) {
            $query = "SELECT $kolom FROM mahasiswa WHERE nidn_wali = '$nidn'";
        }
    }

    $hasil = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }

    return $rows;
}

function getNamaMhs($npm)
{
    global $conn;
    $query = "SELECT nama FROM mahasiswa WHERE npm = '$npm'";
    $hasil = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($hasil)["nama"];
}

function getBimbingan($npm = false, $nidn = false, $id = false)
{
    global $conn;

    $where = "";
    if ($npm != false) {
        $where = "npm_mhs = '$npm'";
    }
    if ($nidn != false) {
        $where = "nidn_dosen = '$nidn'";
    }
    if ($id != false) {
        $where = "id = '$id'";
    }

    if ($nidn == false && $npm == false && $id == false) {
        $query = "SELECT * FROM bimbingan_mhs";
    } else {
        $query = "SELECT * FROM bimbingan_mhs WHERE $where";
    }

    $hasil = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }

    return $rows;
}

function getJenisBimbingan($id)
{
    global $conn;

    $query = "SELECT bahasan FROM list_bimbingan WHERE id = '$id'";

    $hasil = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($hasil)["bahasan"];
}
