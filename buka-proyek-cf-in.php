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

$id = $_SESSION['username'];

$sql = "select email from user where username='$id'";
        
$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Galang Dana | Crowdfunding Investasi</title>
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
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" type="text/css">
        <script type="text/javascript" src="assets/js/my.js"></script>
    </head>
    <body>
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
                                echo "<li><a class=\"is-active\" href=\"saldo-cf-in.php\">Rp $formattedNum</a></li>";
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
                            <a class="navbar-brand" href="home-cf-in.php"><img src="assets/images/ptpnx-logo.png" alt=""></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="home-cf-in.php">Beranda</a></li>
                                <li><a href="dashboard-cf-in.php">Dashboard</a></li>
                                <li><a href="profil-cf-in.php">Profil</a></li>
                                <li><a class="is-active" href="buka-proyek-cf-in.php">Galang Dana</a></li>
                                <li><a href="faq-cf-in.php">FAQ</a></li>
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
                <h1 class="page-title">GALANG DANA<span class="title-under"></span></h1>
            </div>
        </div>
        <div class="main-container">
            <div class="container">
                <hr>
                <div class="row">
                    <!-- edit form column -->
                    <div class="col-md-10">
                        <form class="form-horizontal" role="form" method="post" action="cek_proyek.php">
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Nama Proyek:</label>
                                <div class="col-lg-5">
                                    <input class="form-control" type="text" placeholder="Ketikkan Judul Proyek Anda" name="proyek" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Email:</label>
                                <div class="col-lg-5">
                                    <output class="form-control" style="border: 0px">
                                        <?php
                                            echo $row['email'];
                                        ?>
                                    </output> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Luas Lahan:</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="number_format" class="form-control" placeholder="Contoh : 2.54" aria-describedby="basic-addon2" name="luas"required>
                                            <span class="input-group-addon" id="basic-addon2">ha</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Lokasi:</label>
                                <div class="col-lg-5">
                                    <input class="form-control" type="text" placeholder="Contoh: Malang" name="alamat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Kategori Tanaman:</label>
                                <div class="col-lg-5">
                                    <select id="kategori_lahan" name="level" class="form-control">
                                        <option value="KBN">KBN</option>
                                        <option value="KDI">KDI</option>
                                        <option value="KBD">KBD</option>
                                        <option value="TG-I">TG-I</option>
                                        <option value="TG-II">TG-II</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Harga Saham per Lembar:</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                                            <input type="number_format" class="form-control" id="inputku" name="hargasaham" placeholder="Contoh : 2.000.000" aria-describedby="basic-addon1 return numbersonly(this, event);" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Kebutuhan Dana:</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                                            <input type="number_format" class="form-control" id="inputku" name="target" placeholder="Contoh : 2.000.000" aria-describedby="basic-addon1 return numbersonly(this, event);" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Waktu Pengumpulan:</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Contoh : 30" aria-describedby="basic-addon2" name="kumpul" required>
                                            <span class="input-group-addon" id="basic-addon2">hari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Waktu Pengerjaan:</label>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Contoh : 6" aria-describedby="basic-addon2" name="kerja"required>
                                            <span class="input-group-addon" id="basic-addon2">bulan</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Deskripsi Lahan:</label>
                                <div class="col-md-5">
                                    <textarea rows="5" class="form-control" placeholder="Deskripsikan Lahan Anda" name="deskripsi" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Unggah Proposal:</label>
                                <div class="col-md-4">
                                    <input type="file" class="btn btn-primary" title="File berbentuk pdf" name="proposal"required>
                                    <a href="#"><i class="fa fa-download"></i>contoh-proposal.doc</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label">Unggah Komoditas/Produk:</label>
                                <div class="col-md-4">
                                    <input type="file" class="btn btn-primary" title="File berbentuk jpg" value="" name="foto"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-5 control-label"></label>
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary" value="Buka Proyek">
                                    <span></span>
                                    <input type="reset" class="btn btn-default" value="Batal">	
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
        <!-- js untuk jquery -->
        <script src="assets/js/jquery-1.11.2.min.js"></script>
        <!-- js untuk bootstrap -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- js untuk moment -->
        <script src="assets/js/moment.js"></script>
        <!-- js untuk bootstrap datetimepicker -->
        <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
            
                 $('#dtp').datetimepicker({
                    format : 'DD/MM/YYYY'
                 });
            
                 $('#dtp_icon').datetimepicker({
                    format : 'DD/MM/YYYY'
                 });
            
                 $('#dtp_jam').datetimepicker({
                    format : 'HH:mm'
                 });
            
            });
        </script>
    </body>
</html>