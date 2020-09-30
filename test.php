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
$nama = $_SESSION['username'];
$get = "SELECT * 
		FROM user
		WHERE username='$nama'";
$set = mysqli_query($conn, $get);
while ($doing = mysqli_fetch_array($set))
{
$saldo = $doing['saldo'];
echo $nama;
echo $doing;
echo $saldo;
echo "aaaa";
}
?>