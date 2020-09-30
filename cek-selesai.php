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

$proyek = $_POST['proyek'];
$inv= $_POST['inv'];
$in = $_POST['in'];
$peng = $_POST['peng'];
$total = $_POST['total'];
$date = date("Y/m/d");
$namaIn = $_POST['namaIn'];
$namaPeng = $_POST['namaPeng'];

$sql = "select * from dana where namaProyek = '$proyek'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query))
{
	$namaInv = $row['investor'];
	$sahamInv = $row['jumlahSaham'];
	$uangInv = $row['jumlahUang'];
	$jumlahInv = $inv * $sahamInv / $total;
	$totalInv = $jumlahInv + $uangInv;
	$investor = mysqli_query($conn,"INSERT INTO saldo (nama, jumlahMasuk, jumlahKeluar, keterangan, tanggal, proyek) 
							VALUES ('$namaInv', '$totalInv', '0', 'Bagi hasil', '$date', '$proyek');");
}

$inisiator = mysqli_query($conn,"INSERT INTO saldo (nama, jumlahMasuk, jumlahKeluar, keterangan, tanggal, proyek) 
							VALUES ('$namaIn', '$in', '0', 'Bagi hasil', '$date', '$proyek');");

$pengelola = mysqli_query($conn,"INSERT INTO saldo (nama, jumlahMasuk, jumlahKeluar, keterangan, tanggal, proyek) 
							VALUES ('$namaPeng', '$peng', '0', 'Bagi hasil', '$date', '$proyek');");

$tot = 0;
$user = "";
$transfer = "select * from saldo where keterangan = 'Bagi hasil' and proyek = '$proyek'";
$do_transfer = mysqli_query($conn, $transfer);
while ($trf = mysqli_fetch_array($do_transfer))
{
	$tmp = $trf['jumlahMasuk'];
	$tot = $tot + $tmp;
	$human = $trf['nama'];
	if ($user != $human) {
		$doing = mysqli_query($conn,"UPDATE user SET saldo = '$tmp' WHERE username = '$human'");
		$user = $human;
	}else {
		$doing = mysqli_query($conn,"UPDATE user SET saldo = '$tot' WHERE username = '$human'");
	}
	


}

if ($pengelola) {
    header("location:dashboard-cf-adm.php");
}

?>

