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

$id = $_GET["id"];
$ket = $_GET["ket"];
$status = $_GET["status"];

if ($ket="Pembukaan Proyek" and $status="true") {
    $sql = "UPDATE kegiatan
            SET status = 'Berlangsung', keterangan= 'Penggalangan Dana'
            WHERE id = '$id'";
}elseif ($ket="Pembukaan Proyek" and $status="cancel") {
    $sql = "DELETE FROM kegiatan
            WHERE id = '$id'";
}

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

if($query){
    header("location:dashboard-cf-adm.php");
}


?>

