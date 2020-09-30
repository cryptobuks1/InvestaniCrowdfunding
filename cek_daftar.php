<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Koneksi.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$kategori = $_POST['kategori'];
if($kategori == "user1"){
$kategori = "Investor";
}
if($kategori == "user2"){
$kategori = "Inisiator";
}
if($kategori == "user3"){
$kategori = "Pengelola";
}

// menyeleksi data admin dengan username dan password yang sesuai
$daftar = mysqli_query($koneksi,"INSERT INTO user (nama, email, alamat, nomorhp, rekening, npwk, nik, username, password, kategori)
VALUES ('', '$email', '', '', '', '', '', '$username', '$password', '$kategori');");

$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	header("location:index.php");
}else{
	header("location:register-cf.php");
}
?>