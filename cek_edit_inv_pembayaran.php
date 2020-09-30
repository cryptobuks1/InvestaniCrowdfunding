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

$id = $_SESSION['username'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$edit = mysqli_query($koneksi,"UPDATE user SET nama ='$nama', email ='$email', alamat ='$alamat', nomorhp ='$nomorhp' WHERE nama = '$id'");

if($edit){
	header("location:profil-cf-inv.php");
}

?>