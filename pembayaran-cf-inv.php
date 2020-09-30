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

$lembar = $_POST['lembar'];
$_SESSION['lembar'] = $lembar;
$proyek = $_SESSION['proyek'];
$id = $_SESSION['id'];
$no = $_SESSION['username'];

$sql = "SELECT * 
        FROM kegiatan WHERE id='$id'";
$data = "SELECT * 
        FROM user WHERE username='$no'";
        
$query = mysqli_query($conn, $sql);
$test = mysqli_query($conn, $data);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

$db = mysqli_fetch_array($test);
$doing = mysqli_fetch_array($query);
$value = $doing['sisasaham'];
if ($lembar>$value) {
  echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
}

?>

<!DOCTYPE html>
<html class="no-js">
     <head>
        <meta charset="utf-8">
        <title>Check Out | Crowdfunding Investani</title>
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
                       </ul> <!-- /.header-contact  -->
                      
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
                  
                  <a class="navbar-brand" href="home-cf-in.php"><img src="assets/images/ptpnx-logo.png" alt=""></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">
                    <li><a href="home-cf-inv.php">Beranda</a></li>
					<li><a href="dashboard-cf-inv.php">Dashboard</a></li>
					<li><a href="profil-cf-inv.php">Profile</a></li>
                    <li><a href="proyek-cf-inv.php">Proyek</a></li>
					<li><a href="faq-cf-inv.php">FAQ</a></li>

                  
                 

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->
		
		
		
        <div class="page-heading text-center">

            <div class="container zoomIn animated">
                <h1 class="page-title">PEMBAYARAN<span class="title-under"></span></h1>
            </div>
        </div>
        <div class="container">
	  <div class="panel panel-primary text-center no-boder">
						<div id="exTab1" class="container">	
						<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1">
			  
                    <div class="row">
                <div class="col-lg-11">

  			  	 <p align="left"> <h2><b>KONFIRMASI PROYEK YANG ANDA PILIH</b></h2> </p>				 

                    <!--Simple table example -->
                            <div class="row">
							
              				  <div class="col-md-11 col-sm-offset-1">
								
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th><center>Nama Proyek</center></th>
                                                    <th><center>Durasi Pengerjaan</center></th>
                                                    <th><center>Jumlah Saham</center></th>
                                                    <th><center>Total Harga</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        $status = $doing['sisasaham'];
                                                        $hargatot = $doing['hargasaham'] * $lembar;
                                                        $_SESSION['harga'] = $hargatot;
                                                        $_SESSION['kumpul'] = $doing['kumpul'];
                                                        $_SESSION['kerja'] = $doing['kerja'];
                                                        echo '<tr>
                                                                <td>'.$doing['proyek'].'</td>
                                                                <td>'.$doing['kerja'], ' bulan'.'</td>
                                                                <td>'.$lembar, ' lembar'.'</td>
                                                                <td>'.'Rp ', number_format($hargatot,0,',','.').'</td>
                                                            </tr>';
                                                    ?>
                                            </tbody>
                                        </table>
											
										
                                    </div>
 								  <div class="form-group">
           							 <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
             						   <p>SYARAT DAN KETENTUAN INVESTASI</p>
                              <p>Jika dalam berjalannya kegiatan apapun yang dilaksanakan oleh dan/atau mengatasnamakan Investani terdapat kontrak, perjanjian, atau hal apapun yang bersifat mengikat sebuah hak dan kewajiban dengan pihak lain, serta di dalamnya bertentangan dengan dengan Syarat dan Ketentuan, maka kontrak dan/atau perjanjian tersebut dianggap tidak berlaku.</p>
                              <p>Investani akan melakukan penggalangan Dana Permodalan dengan jangka waktu yang telah ditetapkan sebelumnya dan tertera di setiap Proyek Permodalan dalam website Invesani.</p>
                              <p>Pemodal wajib mengisi informasi pribadi dengan benar, seperti Nama, Alamat, Nomor Rekening serta informasi lainnya. Kesalahan yang timbul dalam kegiatan transaksi permodalan maupun Pencairan Dana yang disebabkan oleh kelalaian pemodal bukan merupakan tanggung jawab dari pihak Investani.</p>
                              <p>Pemodal tidak dapat memindahkan, menukar dan/atau menarik Dana Permodalan dari  Proyek Permodalan yang telah dikonfirmasi transaksinya. Namun, jika Proyek Permodalan tidak sesuai dengan waktu yang seharusnya maka pemodal dapat melakukan pembatalan permodalan.</p>
                              <p>Dana Permodalan yang dibatalkan sebagaimana disebutkan pada butir 4 akan dikirimkan ke wallet pemodal yang melakukan pembatalan.</p>
                              <p>Dana Permodalan yang telah dimodali dan telah digunakan untuk melakukan Proyek Permodalan tidak bisa diambil sebelum Proyek Permodalan dinyatakan selesai.</p>
                              <p>Bila pemodal melakukan transaksi ke Proyek Permodalan yang telah melewati batas waktu dan/atau dana telah mencukupi, maka dana tersebut akan dikembalikan ke pemodal dalam bentuk saldo wallet masing-masing pemodal.</p>
                              <p>Saldo dalam wallet dapat dimodali ke Proyek Permodalan dan/atau dapat dicairkan dalam bentuk uang dengan metode transfer ke rekening pemodal yang tertera, baik sebagian maupun sepenuhnya dengan konfirmasi pemodal sebelumnya.
                           </p>
          						  </div>

   								 <div class="form-group">
      								  <div class="col-xs-4 col-xs-offset-4">
          							  <div class="checkbox">
            						   
              					  <div class="col-md-11 col-sm-offset-1">
										<a href="#3" data-toggle="tab" class="btn btn-primary">Setuju dan Lanjutkan</a>
							   		</div>
           							 </div>
       								 </div>
   								 </div>
										
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->

					</div>
					</div>
				</div>
					
      <div class="tab-pane" id="3">
			   <div class="row">
			     <div class="col-lg-11">
               <div class="panel-group" id="accordion">
                <h2>Maaf Saldo Anda Kurang</h2>
                <?php
                echo "<h3>Saldo Anda Rp $formattedNum</h3>";
                ?>
                <h5>Anda harus mengisi saldo anda untuk dapat melakukan transaksi pada Investani</h5>
                <h5>Segala kegiatan perputaran uang pada Investani diawasi langsung oleh Otoritas Jasa Keuangan (OJK) Republik Indonesia</h>
                <h5>Apabila setelah melakukan pengisian saldo pada akun anda tetapi saldo Investani anda belum bertambah, silahkan lakukan konfirmasi pengisian saldo</h5>
                <h5>Jika memiliki pertanyaan atau masalah lebih lanjut silahkan hubungin kontak kami</h5>
               </div>
								<a href="#" class="btn " data-toggle="modal" data-target="#isiModal">Cara Isi Saldo</a>
                <a href="#" class="btn " data-toggle="modal" data-target="#konfirmasiModal">Konfirmasi</a>
             </div>
			   </div>
		  </div>

				
		
					
					
					<div class="tab-pane" id="5">
              				  <div class="col-md-10 col-sm-offset-1">
				<div class="row">
      			  	 <p align="left"> <h2><b>Transaksi Anda Sedang Diproses</b></h2> </p>				 
					<div class="progress">
 					 <div class="progress-bar progress-bar-striped active" role="progressbar"
 					 aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:100%">
   					 Mohon Tunggu
  					</div>
				</div>
                        <div class="col-lg-6 col-md-offset-3">
                            <div class="panel panel-primary text-center no-boder">
                                <div class="panel-body blue">
                                 
                                    <h3>
                            <form class="form" action="cek_pembayaran.php" method="post">
                              <?php
                              $hargatot = $_SESSION['harga'];
                              $nama = $_SESSION['username'];
                              $kumpul = $_SESSION['kumpul'];
                              $kerja = $_SESSION['kerja'];
                              echo "<input type=\"hidden\" name=\"proyek\" value=\"$proyek\">";
                              echo "<input type=\"hidden\" name=\"harga\" value=\"$hargatot\">";
                              echo "<input type=\"hidden\" name=\"nama\" value=\"$nama\">";
                              echo "<input type=\"hidden\" name=\"kumpul\" value=\"$kumpul\">";
                              echo "<input type=\"hidden\" name=\"kerja\" value=\"$kerja\">";
                              echo "<input type=\"number\" hidden name=\"lembar\" value=\"$lembar\">";
                              ?>
                              
                              <input type="file" name="foto" class="form-control"></h3>
                                </div>
                                <div class="panel-footer">
                                    <span class="panel-eyecandy-title">Unggah Bukti Transfer
                                    </span>
                                </div>
                            </div>
                        </div>

                             <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-12">
                                    	<input type="submit" value="Konfirmasi" class="btn btn-primary">
                                </div>
                            </div> 
                            </form>               

                              

					</div>				
					</div>
					</div>
         
					</div>				
				</div>
			</div>
  </div>

                      
                    </div>	
	  </div>

    <!-- Konfirmasi Modal -->
        <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="konfirmasiModal">
                            <center>Pengisian Saldo</center>
                        </h4>
                    </div>
                    <div class="modal-body">
            <div class="form-group">
            <center><label class="col-lg-12 control-label">Jumlah Tagihan Yang Harus Anda Bayar</label></center>
            <div class="col-lg-12">
                           <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp</span>
                                <output class="form-control">
                                      <?php
                                            $hargatot = $_SESSION['harga'];
                                            echo number_format($hargatot,0,',','.');
                                        ?>
                                    </output>
                            </div>
            </div>
            </div>
          </div><br>
          <div class="modal-body">
            <div class="form-group">
              <center><label class="col-lg-12 control-label">Unggah Bukti Transfer Anda</label></center>
             <form class="form" action="cek_pembayaran.php" method="post">
                              <?php
                              $hargatot = $_SESSION['harga'];
                              $nama = $_SESSION['username'];
                              $kumpul = $_SESSION['kumpul'];
                              $kerja = $_SESSION['kerja'];
                              echo "<input type=\"hidden\" name=\"proyek\" value=\"$proyek\">";
                              echo "<input type=\"hidden\" name=\"harga\" value=\"$hargatot\">";
                              echo "<input type=\"hidden\" name=\"nama\" value=\"$nama\">";
                              echo "<input type=\"hidden\" name=\"kumpul\" value=\"$kumpul\">";
                              echo "<input type=\"hidden\" name=\"kerja\" value=\"$kerja\">";
                              echo "<input type=\"number\" hidden name=\"lembar\" value=\"$lembar\">";
                              ?>


            
             <input type="file" class="form-control">
            </div>
                    </div>
          <div class="modal-body">
                            <h5>*) Pengisian dana akan diproses maksimal 2x24 jam.</h5>
                            <h5>*) Biaya tambahan yang dikenakan oleh pihak bank akan dibebankan kepada pengguna.</h5>
                    </div>
          <div class="modal-footer">
 
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-12">
                                      <a href="proyek-cf-inv.php" class="btn btn-primary">Batal</a>
                                      <input type="submit" value="Konfirmasi" class="btn btn-primary">
                                </div>
                            </div>                     
        </div>
        </form>
          <br>
                </div>
            </div>
        </div>
        <!-- /.modal -->
    
    <!-- Isi Modal -->
        <div class="modal fade" id="isiModal" tabindex="-1" role="dialog" aria-labelledby="isiModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="isiModal">
                            <center>Tata Cara Pengisian Saldo Investani</center>
                        </h4>
                    </div>
                    <div class="modal-body">
                    <center>
                    <img src="assets/images/icons/bca.png" alt="Person" width="96" height="96">
                                        <h4><p>1. Masukkan kartu BCA anda dan masukkan pin anda</p>
                                        <p>2. Pilih transfer dan pilih BCA Virtual Account</p>
                                        <p>3. Masukkan kode perusahaan Investani : 8888 dan nomor handphone anda yang terdaftar di akun anda (contoh : 
                                            8888081288000000)
                                        </p>
                                        <p>4. Masukkan jumlah nominal yang anda inginkan</p>
                                        <p>5. Ikuti instruksi selanjutnya untuk menyelesaikan transaksi anda</p>
                                        <img src="assets/images/icons/mandiri.png" alt="Person" width="96" height="96">
                                        <p>1. Masukkan kartu Mandiri anda dan masukkan pin anda</p>
                                        <p>2. Pilih Bayar/Beli > Lainnya > Lainnya > Pilih Perusahaan Lainnya</p>
                                        <p>3. Masukkan kode perusahaan Investani : 9898 dan nomor handphone anda yang terdaftar di akun anda (contoh : 
                                            8888081288000000)
                                        </p>
                                        <p>4. Masukkan jumlah nominal yang anda inginkan</p>
                                        <p>5. Ikuti instruksi selanjutnya untuk menyelesaikan transaksi anda</p>
                                        <img src="assets/images/icons/bni.png" alt="Person" width="96" height="96">
                                        <p>1. Masukkan kartu BNI anda dan masukkan pin anda</p>
                                        <p>2. Pilih Menu Lain > Pembayaran > Menu Berikutnya > Menu Berikutnya > Pembayaran Lain Lain </p>
                                        <p>3. Masukkan kode perusahaan Investani : 8080 dan nomor handphone anda yang terdaftar di akun anda (contoh : 
                                            8888081288000000)
                                        </p>
                                        <p>4. Masukkan jumlah nominal yang anda inginkan</p>
                                        <p>5. Ikuti instruksi selanjutnya untuk menyelesaikan transaksi anda</p></h4>
                    </center>
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
        <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>
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