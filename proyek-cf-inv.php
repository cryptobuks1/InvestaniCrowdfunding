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
$doing = mysqli_fetch_array($set);
$saldo = $doing['saldo'];

$sql = 'SELECT * 
        FROM kegiatan WHERE status="Berlangsung" and keterangan="Penggalangan Dana" and danakumpul<target order by id DESC';
        
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Proyek | Investasi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
        <!-- Bootsrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Font awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- PrettyPhoto -->
        <link rel="stylesheet" href="assets/css/prettyPhoto.css">
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
                                <li><a class="is-active" href="proyek-cf-inv.php">Proyek</a></li>
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
                <h1 class="page-title">PROYEK <span class="title-under"></span></h1>
                <p class="page-description">
                </p>
            </div>
        </div>
        <div class="main-container">
            <div class="our-causes fadeIn animated">
                <div class="container">
                    <h2 class="title-style-1">Proyek Yang Tersedia<span class="title-under"></span></h2>
                    <div class="row">
                                        <?php
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($query))
                                            {
                                            $id = $row['id'];
                                            $proyek = $row['proyek'];
                                            $alamat = $row['alamat'];
                                            $kerja = $row['kerja'];
                                            $danakumpul = $row['danakumpul'];
                                            $target = $row['target'];
                                            $foto = $row['foto'];
                                            $bar = $row['danakumpul'] / $row['target'] * 100;
                                            echo "<div class=\"col-md-3 col-sm-6\">";
                                            echo "<div class=\"cause\">";
                                            echo "<img src=\"assets/images/causes/$foto\" alt=\"\" class=\"cause-img\"></img>";
                                            echo "<div class=\"progress cause-progress\">";
                                            echo "<div class=\"progress-bar\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: $bar%;\">$bar%</div></div>";
                                            echo "<h4 class=\"cause-title\">Proyek $proyek</h4>";
                                            echo "<div class=\"cause-details\">Lokasi: $alamat<br><br>";
                                            echo "<class=\"cause-details\">Waktu Pengerjaan: $kerja bulan<br><br>";
                                            echo "<class=\"cause-details\">Dana Terkumpul: Rp $danakumpul<br><br>";
                                            echo "<class=\"cause-details\">Kebutuhan Dana: Rp $target</div>";
                                            echo "<div class=\"btn-holder text-center\">";
                                            echo "<form action=\"detail-proyek.php\" method=\"post\">";
                                            echo "<input type=\"hidden\" name=\"nomor$id\" value=\"$id\">";
                                            echo "<a href='detail-proyek.php?id=$id' class='btn btn-primary'>investasi</a></div></div></div>";
                                            $no++;
                                            }
                                        ?>
                    </div>
                </div>
            </div>
            <!-- /.our-causes -->
        </div>
        <!-- /.main-container  -->
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
        <!-- PrettyPhoto javascript file -->
        <script src="assets/js/jquery.prettyPhoto.js"></script>
        <!-- Google map  -->
        <script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
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