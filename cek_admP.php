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
$ket = $_GET["keterangan"];
$jumlahUang = $_GET["jumlah"];
$nama = $_GET["nama"];
$status = $_GET["status"];

$sqli = "SELECT * FROM kegiatan WHERE proyek='$nama'";
$queryi = mysqli_query($conn, $sqli);
$doing = mysqli_fetch_array($queryi);
$tmp1 = $doing['danasisa'];
$tmp3 = $tmp1 + $jumlahUang;


if ($status='true') {
    $sqla = "UPDATE proyek
            SET status = 'Berlangsung', keterangan = ''
            WHERE id = '$id'";
    $go = mysqli_query($conn, $sqla);
    $sql = "UPDATE kegiatan
            SET status = 'Berlangsung', keterangan = 'Pengerjaan Proyek'
            WHERE proyek = '$nama'";
}else{
    $sqla = "DELETE FROM proyek
            WHERE id = '$id'";
    $go = mysqli_query($conn, $sqla);
    $sql = "UPDATE kegiatan
            SET status = 'Berlangsung', keterangan = 'Pengerjaan Proyek', danasisa = '$tmp3'
            WHERE proyek = '$nama'";
}

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

if($query){
    header("location:dashboard-cf-adm.php");
}else{
    header("location:buka-proyek-cf-adm.php");
}

?>

