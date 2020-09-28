<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "localhost";
$database = "ekoji2";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$hari = array (1 =>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
$jadwal = array (1 =>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

$posisi = array_search($hari[date("N", time())], $hari)-1;
$end = strtotime(date("m/d/Y", strtotime("-".($posisi+1)." days", time())));
$start = strtotime(date("m/d/Y", strtotime("-".($posisi+7)." days", time())));