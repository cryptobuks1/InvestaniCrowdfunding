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
        <title>FAQ | Crowdfunding Investani</title>
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
		<script type="text/javascript" src="assetss/js/jquery-1.10.2.min.js"></script>

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
                       </ul> <!-- /.header-contact  -->
                      
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
                    <li><a href="buka-proyek-cf-in.php">Buka Proyek</a></li>
					<li><a  class="is-active" href="faq-cf-in.php">FAQ</a></li>

                  
                 

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->
		
		
		
        <div class="page-heading text-center">
            <div class="container zoomIn animated">
                <h1 class="page-title">FAQ<span class="title-under"></span></h1>
            </div>
        </div>
      
	<div class="container">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Apa itu investani?</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    Investani adalah sebuah platform pendanaan yang berfokus pada pengolahan lahan tebu. Anda dapat memilih dua fitur utama pada investani yaitu 
					Crowdfunding dan Peer to Peer Lending. Tujuan kami adalah untuk menyediakan akses pendanaan yang mudah dan dengan berbagai keuntungan.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Apa yang membuat investani berbeda?</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                     Crowdfunding atau penggalangan dana adalah proses mengumpulkan sejumlah uang untuk sebuah proyek atau usaha. Sistem crowdfunding diciptakan
					 untuk mempertemukan para investor yang ingin mendukung para petani yang membutuhkan dukungan modal pada lahan mereka
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Bagaimana sistem crowdfunding pada investani?</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                     Saat inisiator membuka proyek , siapa saja akan dapat menjadi investor dengan membeli minimal satu lembar saham dengan nilai harga yang telah ditentukan.
					 Kemudian saat dana telah 100% tekumpulkan , proyek akan dikelola oleh pihak PTPN X . Lalu saat proyek telah selesai dikelola , keuntungan akan dibagikan 
					 kesemua pihak yang terlibat sesuai dengan ketentuan.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Bagaimana cara saya membuka proyek?</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    Setelah mendaftar menjadi inisiator , silahkan buka halaman <a href="buka-proyek.php"> Buka Proyek </a> , kemudian isi detail proyek yang akan anda buat , 
					lalu upload dan submit proposal anda. Tunggu sampai anda mendapatkan pemberitahuan via email , jika disetujui proyek anda telah berhasil dibuka.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Bagaimana jika dana tidak mencukupi sampai batas pengumpulan dana?</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    Anda akan dihubungi oleh pihak investani , apakah anda akan tetap melanjutkan proyek dengan dana yang terkumpul atau anda akan membatalkan proyek anda. Jika
					anda melanjutkan diharapkan proyek akan selesai sesuai dengan ketentuan waktu , namun jika anda membatalkan seluruh dana akan dikembalikan ke investor dan proyek
					tidak diijinkan berjalan.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Bagaimana jika terdapat kecurangan atau manipulasi terhadap proyek yg sedang dikerjakan?</a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    Proyek akan diberhentikan sesuai dengan kesepakatan , dan dana investor akan dikembalikan.
                    <br />
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Jika dana telah terkumpul , bagaimana saya dapat mencairkannya?</a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="panel-body">
                    Silahkan lakukan pencairan dana via virtual bank sesuai dengan timeline kegiatan. Kemudian lampirkan bukti progress pengerjaan untuk dapat mencarikan dana untuk pengerjaan 
					progress selanjutnya. Dana hanya dapat dicairkan sesuai dengan timeline kegiatan pengerjaan .
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Bagaimana sistem pembagian hasil keuntungan?</a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="panel-body">
                    Investor akan mendapat 75% dari keuntungan , inisiator akan mendapat 25% , dan investani akan mendapat 5%.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Apa yang terjadi apabila proyek mengalami kerugian atau gagal panen?</a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse">
                <div class="panel-body">
                    Perlu diperhatikan bahwa program crowdfunding pada investani juga memiliki resiko seperti investasi lainnya. Pihak PTPN X selaku pengelola
					dengan kredibilitas yang tinggi dan terpercaya akan berusaha semaksimalnya untuk meminimalkan segala kerugian yang terjadi.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Siapa yang akan melakukan regulasi dan pengawasan terhadap keungan pada investani?</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                    Investani diawasi oleh Otoritas Jasa Keuangan (OJK) dengan nomor tanda terdaftar X-XXX-/XX.XXX/XXXX. Investani termasuk dalam perusahaan
					teknologi keuangan yang terselenggara secara teratur , adil , transparan , akuntabel , dan mampu melindungi segala kepentingan didalamnya.
                </div>
            </div>
        </div>
    </div>
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
		<script src="assets/js/modernizr.js"></script>
		<script src="js/jquery-2.1.1.js"></script>
		<script src="js/jquery.mobile.custom.min.js"></script>
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