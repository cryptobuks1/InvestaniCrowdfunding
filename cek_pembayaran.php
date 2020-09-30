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
$proyek = $_POST['proyek'];
$harga = $_POST['harga'];
$nama = $_POST['nama'];
$kumpul = $_POST['kumpul'];
$kerja = $_POST['kerja'];
$foto = $_POST['foto'];
$lembar = $_POST['lembar'];

$sqli = "SELECT * FROM kegiatan WHERE proyek='$proyek'";
$query = mysqli_query($conn, $sqli);
$doing = mysqli_fetch_array($query);
$tmp1 = $doing['sisasaham'];
$tmp2 = $doing['danakumpul'];
$tmp3 = $tmp1 - $lembar;
$tmp4 = $tmp2 + $harga;

$date = date("Y/m/d");

if ($tmp3==0) {
	$daftar = mysqli_query($koneksi,"INSERT INTO dana (namaProyek, jumlahUang, investor, keterangan, buktiTransfer, statusDana, kumpul, kerja, jumlahSaham, tanggal) VALUES ('$proyek', '$harga', '$nama', 'Top Up', '$foto', 'Menunggu Persetujuan', '$kumpul', '$kerja', '$lembar', '$date');");
	$sql = mysqli_query($koneksi,"UPDATE kegiatan SET sisasaham = '$tmp3', danakumpul = '$tmp4', keterangan = 'Pengerjaan Proyek', pengelola = 'andi', danasisa = '$tmp4' WHERE proyek = '$proyek'");
}else{
	$daftar = mysqli_query($koneksi,"INSERT INTO dana (namaProyek, jumlahUang, investor, keterangan, buktiTransfer, statusDana, kumpul, kerja, jumlahSaham, tanggal) VALUES ('$proyek', '$harga', '$nama', 'Top Up', '$foto', 'Menunggu Persetujuan', '$kumpul', '$kerja', '$lembar', '$date');");
	$sql = mysqli_query($koneksi,"UPDATE kegiatan SET sisasaham = '$tmp3', danakumpul = '$tmp4' WHERE proyek = '$proyek'");

}

if($sql){
	header("location:dashboard-cf-inv.php");
}else{
	header("location:proyek-cf-inv.php");
}

//menangkap data yang dipostkan pembeli
$angkaa= $_POST['angkaa'] ;
$angkab= $_POST['angkab'] ;
$angka1= str_replace(".", "", $angkaa);
$angkaminus = str_replace("", "", -$angka1);
$angka2= str_replace(".", "", $angkab);
echo "$angkaminus <br/> $angka2";

?>