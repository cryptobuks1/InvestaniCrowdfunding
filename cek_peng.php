<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Koneksi.php';
 
// menangkap data yang dikirim dari form
$tanggal = $_POST['tanggal'];
$jumlah = $_POST['jumlah'];
$ket = $_POST['ket'];
$foto = $_POST['foto'];

$nama = $_SESSION['username'];

$jumlah = str_replace('.', '', $jumlah);

if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM kegiatan WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query))
        {
        	$awal = $row['danakumpul'];
        	echo "$awal";
        }
}

// menyeleksi data admin dengan username dan password yang sesuai
$daftar = mysqli_query($koneksi,"INSERT INTO pengelola (tanggal, jumlahuang, foto, keterangan, namapengelola) VALUES ('$tanggal', '$jumlah', '$ket', '$foto', '$id');");
$tot = $awal - $jumlah;
$ambil = mysqli_query($koneksi, "UPDATE kegiatan SET danasisa = '$tot' WHERE id = '$id';");

if($daftar){
	header("location:dashboard-cf-pe.php");
}else{
	header("location:dashboard-cf-pe.php");
}

//menangkap data yang dipostkan pembeli
$angkaa= $_POST['angkaa'] ;
$angkab= $_POST['angkab'] ;
$angka1= str_replace(".", "", $angkaa);
$angkaminus = str_replace("", "", -$angka1);
$angka2= str_replace(".", "", $angkab);
echo "$angkaminus <br/> $angka2";

?>
