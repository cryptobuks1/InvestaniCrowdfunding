<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Koneksi.php';
 
// menangkap data yang dikirim dari form
$proyek = $_POST['proyek'];
$luas = $_POST['luas'];
$alamat = $_POST['alamat'];
$hargasaham = $_POST['hargasaham'];
$target = $_POST['target'];
$kumpul = $_POST['kumpul'];
$kerja = $_POST['kerja'];
$deskripsi = $_POST['deskripsi'];
$proposal = $_POST['proposal'];
$foto = $_POST['foto'];
$level = $_POST['level'];

$hargasaham = str_replace('.', '', $hargasaham);
$target = str_replace('.', '', $target);

$id = $_SESSION['username'];
$query = mysqli_query($koneksi,"SELECT email FROM user WHERE username = '$id'");
$row = mysqli_fetch_array($query);
$email = $row['email'];

$jumlahsaham = $target / $hargasaham;
echo $jumlahsaham.' '. $target.' '.$hargasaham;


mysqli_query($koneksi,"SELECT * FROM kegiatan");



// menyeleksi data admin dengan username dan password yang sesuai
$daftar = mysqli_query($koneksi,"INSERT INTO kegiatan (proyek, email, luas, danakumpul, danasisa, target, kumpul, kerja, deskripsi, proposal, foto, level, status, alamat,  jumlahsaham, sisasaham, hargasaham, inisiator, pengelola, keterangan) VALUES ('$proyek', '$email', '$luas', '', '', '$target', '$kumpul', '$kerja', '$deskripsi', '$proposal', '$foto', '$level', 'Menunggu Persetujuan', '$alamat', '$jumlahsaham', '$jumlahsaham', '$hargasaham', '$id', '', 'Pembukaan Proyek');");

if($daftar){
	header("location:dashboard-cf-in.php");
}else{
	header("location:buka-proyek-cf-in.php");
}

//menangkap data yang dipostkan pembeli
$angkaa= $_POST['angkaa'] ;
$angkab= $_POST['angkab'] ;
$angka1= str_replace(".", "", $angkaa);
$angkaminus = str_replace("", "", -$angka1);
$angka2= str_replace(".", "", $angkab);
echo "$angkaminus <br/> $angka2";

?>