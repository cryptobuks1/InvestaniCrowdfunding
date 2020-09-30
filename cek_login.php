<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

$level = mysqli_query($koneksi,"select level from user where username='$username' and password='$password'");
 
// menyeleksi data admin dengan username dan password yang sesuai
$data1 = mysqli_query($koneksi,"select * from user where username='$username' and password='$password' and kategori='Pengelola'");
$data2 = mysqli_query($koneksi,"select * from user where username='$username' and password='$password' and kategori='Investor'");
$data3 = mysqli_query($koneksi,"select * from user where username='$username' and password='$password' and kategori='Inisiator'");
$data4 = mysqli_query($koneksi,"select * from user where username='$username' and password='$password' and kategori='Admin'");
 
// menghitung jumlah data yang ditemukan
$cek1 = mysqli_num_rows($data1);
$cek2 = mysqli_num_rows($data2);
$cek3 = mysqli_num_rows($data3);
$cek4 = mysqli_num_rows($data4);

if($cek1 > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:dashboard-cf-pe.php");
}else if($cek2 > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:home-cf-inv.php");
}else if($cek3 > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:home-cf-in.php");
}else if($cek4 > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:dashboard-cf-adm.php");
}else{
	header("location:login-cf.php");
}
?>