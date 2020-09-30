<?php
session_start();
error_reporting(0);
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
$doing = mysqli_fetch_array($set);
$saldo = $doing['saldo'];

$user = $_SESSION['username'];

$id = $_GET["id"];

$sql = "select * from kegiatan where id='$id'";
        
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

$row = mysqli_fetch_array($query);

$sql1 = 'SELECT * 
        FROM kegiatan';
        
$query1 = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Detail Proyek | Crowdfunding Investani</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- Template main Css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Modernizr -->
        <script src="assets/js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!-- NAVBAR
            ================================================== -->
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="navbar-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <ul class="list-unstyled list-inline header-contact">
                                    <li> <i class="fa fa-phone"></i> <a href="tel:">(031) 3523143  </a> </li>
                                    <li> <i class="fa fa-envelope"></i> <a href="mailto:contact@ptpn10.co.id">contact@ptpn10.co.id</a> </li>
                                </ul>
                                <!-- /.header-contact  -->
                            </div>
                            <?php
                                echo "<div class=\"col-sm-6 col-xs-12 text-right\">";
                                echo "<ul class=\"list-unstyled list-inline header-social\">";
                                echo "<li><img src=\"assets/images/icons/wallet.png\"></li>";
                                $formattedNum = number_format($saldo,0,',','.')."<br>";
                                echo "<li><a class=\"is-active\" href=\"saldo-cf-inv.php\">Rp $formattedNum</a></li>";
                                echo "<li><a class=\"is-active\" href=\"logout.php\">Keluar</a></li></ul></div>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="navbar-main">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="home-cf-inv.php"><img src="assets/images/ptpnx-logo.png" alt=""></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="home-cf-inv.php">Beranda</a></li>
                                <li><a href="dashboard-cf-inv.php">Dashboard</a></li>
                                <li><a href="profil-cf-inv.php">Profil</a></li>
                                <li><a href="proyek-cf-inv.php">Proyek</a></li>
                                <li><a href="faq-cf-inv.php">FAQ</a></li>
                            </ul>
                        </div>
                        <!-- /#navbar -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.navbar-main -->
            </nav>
        </header>
        <!-- /. main-header -->
        <div class="page-heading text-center">
            <div class="container zoomIn animated">
                <h1 class="page-title">DETAIL PROYEK<span class="title-under"></span></h1>
                <p class="page-description">
                </p>
            </div>
        </div>
        <div class="main-container">
            <div class="container">
                <?php
                $id = $row['id'];
                $proyek = $row['proyek'];
                $_SESSION['proyek'] = $proyek;
                $_SESSION['id'] = $id;
                echo "<h1>Proyek $proyek</h1>";
                "<hr>";
                ?>
                <hr>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <?php
                        $bar = $row['danakumpul'] / $row['target'] * 100;
                        echo "<div class=\"progress cause-progress\">";
                        echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $bar%;\">$bar%</div></div>";
                        ?>
                        <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">
                            <!-- Indicators -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <?php
                                    $foto = $row['foto'];
                                    echo "<img src=\"assets/images/causes/$foto\" alt=\"\" class=\"cause-img\"></img>";
                                    ?>
                                    <div class="container">
                                    </div>
                                </div>
                                <!-- /.item -->
                            </div>
                        </div>
                        <div class="panel panel-primary text-center no-boder">
                            <div class="panel-body blue">
                                <p><b>Rincian dan proyeksi laporan keuangan telah dirangkum dalam file .pdf yang dapat anda unggah pada link dibawah.</b></p>
                                <button class="btn" style="width:100%"><i class="fa fa-download"></i> </b>proyek-1.pdf</b></button>
                            </div>
                        </div>
                        <div class="panel panel-primary text-center no-boder">
                            <div class="panel-body blue">
                                <div class="chip">
                                    <img src="assets/images/icons/avatar.png" alt="Person" width="96" height="96">
                                    Alfin Martin |                     
                                    <i class="fa fa-phone"></i> <a href="tel:">081288051111 </a> 
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="panel-eyecandy-title">Pengelola
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- edit form column -->
                    <div class="col-md-6 personal-info">
                        <form class="form-horizontal" role="form" action="pembayaran-cf-inv.php" method="post">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Luas Lahan:</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo $row['luas'], " ha";
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Kategori Tanaman:</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo $row['level'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Lokasi:</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo $row['alamat'];
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Durasi Pengerjaan:</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo $row['kerja'], " bulan";
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Biaya yang Dibutuhkan:</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo "Rp ",number_format($row['target'],0,',','.');
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Dana Yang Telah Terkumpul:</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo "Rp ",number_format($row['danakumpul'],0,',','.');
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Jumlah Saham</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo $row['jumlahsaham']," Lembar";
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Jumlah Saham Tersedia</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo $row['sisasaham']," Lembar";
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Saham per Lembar</label>
                                <div class="col-md-8">
                                    <output class="form-control" style="border: 0px">
                                    	<?php
                                            echo "Rp ",number_format($row['hargasaham'],0,',','.');
                                        ?>
                                    </output>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Lembar Saham yang Dibeli:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="number" name="lembar" placeholder="Contoh : 5"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" value="Konfirmasi" class="btn btn-primary">
                                    <a href="proyek-cf-inv.php" class="btn btn-primary">Batal</a>
                                    <span></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <footer class="main-footer">
            <div class="footer-top">
            </div>
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-col">
                                <h4 class="footer-title">Tentang Kami <span class="title-under"></span></h4>
                                <div class="footer-content">
                                    <p>
                                        <strong>INVESTANI</strong> 
                                    </p>
                                    <p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-col">
                                <h4 class="footer-title"> Media Sosial <span class="title-under"></span></h4>
                                <div class="footer-content">
                                    <ul class="tweets list-unstyled">
                                        <li class="tweet"> 
                                            Twitter 
                                        </li>
                                        <li class="tweet"> 
                                            Twitter
                                        </li>
                                        <li class="tweet"> 
                                            Twitter
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-col">
                                <h4 class="footer-title">Kontak Kami <span class="title-under"></span></h4>
                                <div class="footer-content">
                                    <div class="footer-form">
                                        <div class="footer-form" >
                                            <ul class="list-unstyled contact-items-list">
                                                <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-map-marker"></i></span> Jl. Jembatan Merah No 3-11, Surabaya 60175 Jawa Timur, Indonesia</li>
                                                <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-phone"></i></span> 031 3523143</li>
                                                <li class="contact-item"> <span class="contact-icon"> <i class="fa fa-envelope"></i></span> contact@ptpn10.co.id</li>
                                            </ul>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            </div>
            <div class="footer-bottom">
                <div class="container text-right">
                    INVESTANI @ copyrights 2018 - by <a href="http://www.ptpn10.co.id" target="_blank">PTPN X</a>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>
        <!-- Bootsrap javascript file -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Template main javascript -->
        <script src="assets/js/main.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>