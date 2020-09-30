<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Koneksi.php';

$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'db_investani'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());    
}
 
// menangkap data yang dikirim dari form
$tanggal = $_POST['tanggalAmbil'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$foto = $_POST['foto'];
$namaProyek = $_POST['namaProyek'];
$danaSisa = $_POST['danaSisa'];
$user = $_SESSION['username'];

$jumlah = str_replace('.', '', $jumlah);


if ($jumlah>$danaSisa) {
  echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
}
$sisa = $danaSisa - $jumlah;

$daftar = mysqli_query($koneksi,"INSERT INTO proyek (namaProyek, tanggalAmbil, jumlahAmbil, deskripsiAmbil, fotoAmbil, pengelola, status, keterangan) VALUES ('$namaProyek', '$tanggal', '$jumlah', '$deskripsi', '$foto', '$user', 'Menunggu Persetujuan', 'Pengambilan Dana');");
$sql = mysqli_query($koneksi,"UPDATE kegiatan SET danasisa = '$sisa' WHERE proyek = '$namaProyek'");

if($sql){
	header("location:dashboard-cf-pe.php");
}else{
	header("blank.php");
}

?>