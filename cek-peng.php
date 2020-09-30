<?php
session_start();
if(!isset($_SESSION['username'])){
    die("Anda belum terdaftar");
}

$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'db_investani'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());    
}

$id = $_POST["id"];
$jumlah = $_POST["jumlah"];
$laporan = $_POST["laporan"];
$untung = str_replace('.', '', $jumlah);

$sql = "UPDATE kegiatan
            SET status = 'Selesai', keterangan= '', Untung = '$untung', laporan = '$laporan'
            WHERE id = '$id'";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("location:dashboard-cf-pe.php");
}

?>

