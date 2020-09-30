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
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Home | Investani</title>
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
        <link href="assets/cs/morris-0.4.3.min.css" rel="stylesheet" />
        <link href="assets/css/main-style.css" rel="stylesheet" />
        <link href="assets/css/timeline.css" rel="stylesheet" />
        <link href="assets/css/morris-0.4.3.min.css" rel="stylesheet" />
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
                            <div class="col-sm-6 col-xs-12 text-right">
                            </div>
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
                                <li><a class="is-active" href="home-cf-inv.php">Beranda</a></li>
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
        <!-- Carousel
            ================================================== -->
        <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#homeCarousel" data-slide-to="1"></li>
                <li data-target="#homeCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="assets/images/slider/home-slider-1.jpg" alt="" >
                    <div class="container">
                        <div class="carousel-caption">
                            <h2 class="carousel-title bounceInDown animated slow">SELAMAT DATANG INVESTOR</h2>
                            <h4 class="carousel-subtitle bounceInUp animated slow ">AYO BANTU PETANI INDONESIA DENGAN IKUT BERINVESTASI </h4>
                            <a href="proyek-cf-inv.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >INVESTASI</a>
                        </div>
                        <!-- /.carousel-caption -->
                    </div>
                </div>
                <!-- /.item -->
                <div class="item ">
                    <img src="assets/images/slider/home-slider-2.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h2 class="carousel-title bounceInDown animated slow">CROWDFUNDING</h2>
                            <h4 class="carousel-subtitle bounceInUp animated slow">DAPATKAN KEUNTUNGAN 75% BAGI INVESTOR</h4>
                            <a href="proyek-cf-inv.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >INVESTASI</a>
                        </div>
                        <!-- /.carousel-caption -->
                    </div>
                </div>
                <!-- /.item -->
                <div class="item ">
                    <img src="assets/images/slider/home-slider-3.jpg" alt="">
                    <div class="container">
                        <div class="carousel-caption">
                            <h2 class="carousel-title bounceInDown animated slow" >SEMUA ORANG BISA BERINVESTASI</h2>
                            <h4 class="carousel-subtitle bounceInUp animated slow">Investasi Untuk Mendapatkan Keuntungan Dengan Memilih Berbagai Proyek Yang Sesuai Dengan Kebutuhan Anda</h4>
                            <a href="proyek-cf-inv.php" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" >INVESTASI</a>
                        </div>
                        <!-- /.carousel-caption -->
                    </div>
                </div>
                <!-- /.item -->
            </div>
            <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- /.carousel -->
        <div class="section-home about-us fadeIn animated">
            <div class="container">
              <h2 class="title-style-1">4 LANGKAH MUDAH MEMULAI INVESTASI<span class="title-under"></span></h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="about-us-col">
                            <div class="col-icon-wrapper">
                                <img src="assets/images/icons/pin-icon.png" alt="">
                            </div>
                            <h3 class="col-title">PILIH PROYEK</h3>
                            <div class="col-details">
                                <p>Anda dapat memilih proyek dari daftar yang telah tersedia. Pilihlah proyek sesuai keinginan Anda.</p>
                            </div>
                            <a class="btn btn-primary">Langkah 1</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="about-us-col">
                            <div class="col-icon-wrapper">
                                <img src="assets/images/icons/card-icon.png" alt="">
                            </div>
                            <h3 class="col-title">BAYAR SAHAM</h3>
                            <div class="col-details">
                                <p>Anda melakukan transfer ke rekening kami. Transferlah sesuai nominal harga yang tertera pada sistem.</p>
                            </div>
                            <a class="btn btn-primary">Langkah 2</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="about-us-col">
                            <div class="col-icon-wrapper">
                                <img src="assets/images/icons/notes-icon.png" alt="">
                            </div>
                            <h3 class="col-title">LAPORAN KERJA</h3>
                            <div class="col-details">
                                <p>Tim kami akan memberikan informasi tetang laporan pengerjaan di lapangan</p>
                            </div>
                            <a class="btn btn-primary">Langkah 3</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="about-us-col">
                            <div class="col-icon-wrapper">
                                <img src="assets/images/icons/get-money-icon.png" alt="">
                            </div>
                            <h3 class="col-title">TERIMA KEUNTUNGAN</h3>
                            <div class="col-details">
                                <p>Jika proyek sudah selesai, maka Anda dapat menikmati keuntungan dari hasil penjualan proyek.</p>
                            </div>
                            <a class="btn btn-primary">Langkah 4</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-home our-causes animate-onscroll fadeIn">
            <div class="container">
                <h2 class="title-style-1">PENDANAAN YANG TERSEDIA<span class="title-under"></span></h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="assets/images/causes/proyek-1.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                    25%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 1 </a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Malang</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.25.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                            <div class="btn-holder text-center">
                                <a href="detail-proyek.php" class="btn btn-primary" > SELENGKAPNYA</a>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="assets/images/causes/proyek-2.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                    50%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 2</a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Surabaya</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.50.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                            <div class="btn-holder text-center">
                                <a href="detail-proyek.php" class="btn btn-primary" > SELENGKAPNYA</a>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="assets/images/causes/proyek-3.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                                    75%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 3</a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Malang</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.75.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                            <div class="btn-holder text-center">
                                <a href="detail-proyek.php" class="btn btn-primary" > SELENGKAPNYA</a>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            <img src="assets/images/causes/proyek-1.jpg" alt="" class="cause-img">
                            <div class="progress cause-progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                    10%
                                </div>
                            </div>
                            <h4 class="cause-title"><a href="#">PROYEK 4 </a></h4>
                            <div class="cause-details">
                                <p> Lokasi          :   Malang</p>
                                <p> Waktu Pengerjaan    :   30 hari</p>
                                <p> Dana Terkumpul      :   Rp.10.000.000;</p>
                                <p> Kebutuhan Dana      :     Rp.100.000.000;</p>
                            </div>
                            <div class="btn-holder text-center">
                                <a href="detail-proyek.php" class="btn btn-primary" > SELENGKAPNYA</a>
                            </div>
                        </div>
                        <!-- /.cause -->
                    </div>
                </div>
                <div class="btn-holder text-center">
                    <a href="proyek-cf-inv.php" class="btn btn-primary" > LIHAT PROYEK LAIN</a>
                </div>
            </div>
        </div>
        <!-- /.our-causes -->
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
        <!-- Donate Modal -->
        <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="donateModalLabel">INVESTASI</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-donation">
                            <h3 class="title-style-1 text-center">Silahkan Isi Form Dibawah<span class="title-under"></span>  </h3>
                            <div class="row">
                                <div class="form-group col-md-12 ">
                                    <input type="text" class="form-control" id="amount" placeholder="Jumlah">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="firstName" placeholder="Nama Depan">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastName" placeholder="Nama Belakang">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="address" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" name="donateNow" >INVESTASI</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
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