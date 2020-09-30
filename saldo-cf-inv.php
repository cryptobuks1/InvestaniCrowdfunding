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

$sql = "SELECT * 
        FROM saldo
        WHERE nama='$nama'
        ORDER BY id DESC";
        
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Saldo | Crowdfunding Investani</title>
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
        <script type="text/javascript" src="assetss/js/jquery-1.10.2.min.js"></script>
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
                <h1 class="page-title">SALDO ANDA<span class="title-under"></span></h1>
            </div>
        </div>
        <?php
        echo "<div class=\"container\">";
            echo "<div class=\"panel panel-primary text-center no-boder\">";
                echo "<div id=\"exTab1\" class=\"container\">";
                    echo "<div class=\"tab-content clearfix\">";
                        echo "<div class=\"tab-pane active\" id=\"3\">";
                            echo "<div class=\"row\">";
                                echo "<center><h3><b>Sisa Saldo Anda <br>Rp $formattedNum</h3></center><br> 
                                <h5>Anda harus mengisi saldo anda untuk dapat melakukan transaksi pada Investani</h5>
                                <h5>Segala kegiatan perputaran uang pada Investani diawasi langsung oleh Otoritas Jasa Keuangan (OJK) Republik Indonesia</h5>
                                <h5>Apabila setelah melakukan pengisian saldo pada akun anda tetapi saldo Investani anda belum bertambah, silahkan lakukan konfirmasi pengisian saldo</h5>
                                <h5>Jika memiliki pertanyaan atau masalah lebih lanjut silahkan hubungin kontak kami</h5>
                                    <a href=\"#\" class=\"btn \" data-toggle=\"modal\" data-target=\"#historyModal\">History Dana</a>
                                    <a href=\"#\" class=\"btn \" data-toggle=\"modal\" data-target=\"#tarikModal\">Tarik Saldo</a><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        ?>
		
		<!-- Tarik Modal -->
        <div class="modal fade" id="tarikModal" tabindex="-1" role="dialog" aria-labelledby="tarikModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tarik Dana Anda</h4>
                    </div>
                    <div class="modal-body">
						<div class="form-group">
						<label class="col-lg-4 control-label">Jumlah Dana:</label>
						<div class="col-lg-8">
                           <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp</span>
                                 <input type="text" class="form-control" id="inputku" name="target" placeholder="Contoh : 2.000.000" aria-describedby="basic-addon1 return numbersonly(this, event);" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                            </div>
						</div>
						</div>
					</div>
					<div class="modal-body">
						<div class="form-group">
                            <label class="col-lg-4 control-label">Nama Bank:</label>
                                <div class="col-lg-8">
                                    <select id="bank" class="form-control">
                                        <option value="bca">BCA</option>
                                        <option value="mandiri">BANK MANDIRI</option>
										<option value="bni">BNI</option>
                                    </select>
                                </div>
                        </div>
                    </div>
					<div class="modal-body">
						<div class="form-group">
                            <label class="col-lg-4 control-label">Nama Pemilik Rekening:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text">
                                </div>
                        </div>
                    </div>
					<div class="modal-body">
						<div class="form-group">
                            <label class="col-lg-4 control-label">Nomor Rekening:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text">
                                </div>
                        </div>
                    </div>
					<div class="modal-body">
						<div class="form-group">
                            <p>Demi kelancaran proses pencairan dana, mohon pastikan kembali <b>nama</b> dan <b>nomor rekening</b> yang dicantumkan sesuai dengan yang tertera pada bukti tabungan anda.</p>
                        </div>
                    </div>
					<div class="modal-body">
						<div class="form-group">
                            <label class="col-lg-4 control-label">Password Investani:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="password">
                                </div>
                        </div>
                    </div>
					<div class="modal-body">
					        <h5>*) Minimal penarikan yang anda dapat carikan adalah Rp.50.000.</h5>
                            <h5>*) Penarikan dana akan diproses maksimal 3x24 jam.</h5>
                            <h5>*) Biaya tambahan yang dikenakan oleh pihak bank akan dibebankan kepada pengguna.</h5>
                    </div>
					<div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<a href="topup-cf-inv.html" class="btn btn-primary">Batal</a>
					    <a href="topup-cf-inv.html" class="btn btn-primary">Konfirmasi</a>
                    </div>
					<br>
                </div>
            </div>
        </div>
        <!-- /.modal -->
		
		<!-- History Modal -->
        <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">History Dana Anda</h4>
                    </div>
                    <div class="modal-body">
								<div class="panel-body">
								 <div class="col-lg-12">
                                  <div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Saldo Masuk</th>
                                                     <th>Saldo Ditarik</th>
                                                     <th>Keterangan</th>
                                                 </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
                                                        echo '<tr>
                                                                <td>'.$row['tanggal'].'</a></td>
                                                                <td>'.'Rp ', number_format($row['jumlahMasuk'],0,',','.').'</td>
                                                                <td>'.'Rp ', number_format($row['jumlahKeluar'],0,',','.').'</td>
                                                                <td>'.$row['keterangan'].'</td>
                                                            </tr>';
                                                    }?>
                                            </tbody>
                                </table>
								  </div>
								</div>
								</div>
					</div><br>
				</div>
				<br>
            </div>
        </div>
 
        <!-- /.modal -->
		
		
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
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>>
        <!-- Template main javascript -->
        <script src="assets/js/main.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- js untuk jquery -->
        <script src="assets/js/jquery-1.11.2.min.js"></script>
        <!-- js untuk bootstrap -->
        <script src="assets/js/bootstrap.js"></script>

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