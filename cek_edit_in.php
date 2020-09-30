<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Koneksi.php';
 
// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$nomorhp = $_POST['nomorhp'];
$rekening = $_POST['rekening'];
$npwk = $_POST['npwk'];
$nik = $_POST['nik'];

$id = $_SESSION['username'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$edit = mysqli_query($koneksi,"UPDATE user SET nama ='$nama', email ='$email', alamat ='$alamat', nomorhp ='$nomorhp', rekening ='$rekening', npwk ='$npwk', nik = '$nik' WHERE nama = '$id'");

if($edit){
	header("location:profil-cf-in.php");
}else{
	header("location:edit-profil-cf-in.php");
}
?>