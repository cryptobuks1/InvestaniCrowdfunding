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

$user = $_SESSION['username'];

$id = $_GET["id"];
$ket = $_GET["keterangan"];
$status = $_GET["status"];
$jumlahUang = $_GET["jumlahUang"];
$jumlahSaham = $_GET["jumlahSaham"];
$proyek = $_GET["proyek"];
$nama = $_GET["namaInv"];

$sqli = "SELECT * FROM kegiatan WHERE proyek='$proyek'";
$queryi = mysqli_query($conn, $sqli);
$doing = mysqli_fetch_array($queryi);
$tmp1 = $doing['sisasaham'];
$tmp2 = $doing['danakumpul'];
$tmp3 = $tmp1 + $jumlahSaham;
$tmp4 = $tmp2 - $jumlahUang;

$date = date("Y/m/d");

if ($ket="Top Up" AND $status="cancel") {
    $sqla = "UPDATE kegiatan
            SET danakumpul = '$tmp4', sisasaham= '$tmp3'
            WHERE proyek = '$proyek'";
    $go = mysqli_query($conn, $sqla);
    $sql = "DELETE FROM dana
            WHERE id = '$id'";
}
if ($ket="Top Up" AND $status="true") {
    $sqla = "INSERT INTO saldo (nama, jumlahMasuk, jumlahKeluar, keterangan, tanggal) 
            VALUES ('$nama', '$jumlahUang', '', 'Investasi proyek', '$date')";
    $go = mysqli_query($conn, $sqla);
    $sql = "UPDATE dana
            SET statusDana = 'Berlangsung', keterangan= ''
            WHERE id = '$id'";
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

