<?php
session_start();

if(!isset($_SESSION['username'])){
    die();
}

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'db_investani';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ();    
}

?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Admin | Crowdfunding Investani</title>
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
                                </ul>
                                <!-- /.header-contact  -->
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right">
                                <ul class="list-unstyled list-inline header-social">
                                    <li><a class="is-active" href="logout.php">Keluar</a></li>
                                </ul>
                                <!-- /.header-social  -->
                            </div>
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
                            <a class="navbar-brand" href="#"><img src="assets/images/ptpnx-logo.png" alt=""></a>
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
                <h1 class="page-title">Admin<span class="title-under"></span></h1>
            </div>
        </div>
		
		
		       <div class="container">
            <!--  page-wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!--Simple table example -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Menunggu Persetujuan</a>
                            </div>
							<div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Pengelola</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal</th>
                                                        <th>Keterangan</th>
														<th>Proposal</th>
                                                        <th>Lain-lain</th>
														<th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql = "select * from proyek where status='Menunggu Persetujuan' and keterangan='Pengambilan Dana'";
												$query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
                                                        $id = $row['id'];
                                                        $ket = $row['keterangan'];
                                                        $jumlah = $row['jumlahAmbil'];
                                                        $proyek = $row['namaProyek'];
														$data=$row['proposal'];
                                                    		echo "<tr>
                                                                <td>".$row["namaProyek"]."</td>
                                                                <td>".$row["pengelola"]."</td>
                                                                <td>".number_format($row['jumlahAmbil'],0,',','.')."</td>
                                                                <td>".$row["tanggalAmbil"]."</td>
                                                                <td>".$row["keterangan"]."</td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data\"><i class=\"fa fa-download\"></i> </b>proposal.pdf</b></a></button></td>
                                                                <td><button class='btn' class='is-active' data-toggle='modal' data-target='#more' data-id=".$row['id'].">Selengkapnya</button></td>
                                                                <td>
                                                                <a href='cek_admP.php?id=$id&keterangan=$ket&status=true'><span class='glyphicon glyphicon-ok'></span></a><br>
                                                                <a href='cek_admP.php?id=$id&keterangan=$ket&status=cancel&jumlah=$jumlah&nama=$proyek'>
                                                                <span class='glyphicon glyphicon-remove'></span>
                                                                </a></td>
                                                                </td>
                                                            </tr>";                                                                
                                                    }
                                                    ?>
                                            	</tbody>
                                            </table>
											<table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Inisiator</th>
                                                        <th>Durasi Pendanaan</th>
                                                        <th>Durasi Pengerjaan</th>
                                                        <th>Keterangan</th>
                                                        <th>Proposal</th>
                                                        <th>Lain-lain</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql = "select * from kegiatan where status='Menunggu Persetujuan' and keterangan='Pembukaan Proyek'";
                                                $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
                                                        $id = $row['id'];
                                                        $ket = $row['keterangan'];
														$data= $row['proposal'];
                                                            echo "<tr>
                                                                <td>".$row["proyek"]."</td>
                                                                <td>".$row["inisiator"]."</td>
                                                                <td>".$row["kumpul"]," hari"."</td>
                                                                <td>".$row["kerja"]," bulan"."</td>
                                                                <td>".$row["keterangan"]."</td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data\"><i class=\"fa fa-download\"></i> </b>proposal.pdf</b></a></button></td>
                                                                <td><button class='btn' class='is-active' data-toggle='modal' data-target='#more' data-id=".$row['id'].">Selengkapnya</button></td>
                                                                <td><a href='cek-adm.php?id=$id&ket=$ket&status=true'><span class='glyphicon glyphicon-ok'></span></a><br>
                                                                <a href='cek-adm.php?id=$id&ket=$ket&status=cancel'>
                                                                <span class='glyphicon glyphicon-remove'></span>
                                                                </a></td>
                                                                </td>
                                                            </tr>";                                                                
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
											<table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Investor</th>
                                                        <th>Jumlah Uang</th>
                                                        <th>Keterangan</th>
														<th>Bukti Transfer</th>
														<th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql = "select * from dana where statusDana='Menunggu Persetujuan' and keterangan='Top Up'";
												$query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
                                                        $id = $row['id'];
                                                        $ket = $row['keterangan'];
                                                        $jumlahUang = $row['jumlahUang'];
                                                        $jumlahSaham = $row['jumlahSaham'];
                                                        $proyek = $row['namaProyek'];
                                                        $namaInv = $row['investor'];
														$data = $row['laporan'];
                                                    		echo "<tr>
                                                                <td>".$row['namaProyek']."</td>
                                                                <td>".$row['investor']."</td>
                                                                <td>".number_format($row['jumlahUang'],0,',','.')."</td>
                                                                <td>".$row['keterangan']."</td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data\"><i class=\"fa fa-download\"></i> </b>bukti-transfer</b></a></button></td>
																<td> <a href='cek-admin.php?id=$id&keterangan=$ket&status=true&jumlahUang=$jumlahUang&namaInv=$namaInv'>
																<span class='glyphicon glyphicon-ok'></span></a><br>
																<a href='cek-admin.php?id=$id&keterangan=$ket&status=cancel&jumlahUang=$jumlahUang&jumlahSaham=$jumlahSaham&proyek=$proyek'>
																<span class='glyphicon glyphicon-remove'></span>
																</a></td>
                                                            </tr>";                                                        
                                                    }?>
                                            	</tbody>
                                            </table>
											
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
						</div>
						
						<div class="panel panel-primary">
                            <div class="panel-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Proyek Berlangsung</a>

                            </div>
						 <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Inisiator</th>
                                                        <th>Durasi Pendanaan</th>
                                                        <th>Durasi Pengerjaan</th>
                                                        <th>Keterangan</th>
														<th>Proposal</th>
                                                        <th>Laporan </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql = "select * from kegiatan where status='Berlangsung' and keterangan='Penggalangan Dana'";
												$query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
														
                                                        $data = $row['proposal'];
														$data2 = $row['laporan'];
                                                    		echo "<tr>
                                                                <td>".$row['proyek']."</td>
                                                                <td>".$row['inisiator']."</td>
                                                                <td>".$row['kumpul'],' hari'."</td>
                                                                <td>".$row['kerja'],' bulan'."</td>
                                                                <td>".$row['keterangan']."</td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data\"><i class=\"fa fa-download\"></i> </b>proposal.pdf</b></a></button></td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data2\"><i class=\"fa fa-download\"></i> </b>laporan.pdf</b></a></button></td>
                                                            </tr>";                                                        
                                                    }?>
                                            	</tbody>
                                            </table>
											
											 <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Inisiator</th>
                                                        <th>Durasi Pendanaan</th>
                                                        <th>Durasi Pengerjaan</th>
                                                        <th>Keterangan</th>
														<th>Proposal</th>
                                                        <th>Laporan </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql = "select * from kegiatan where status='Berlangsung' and keterangan='Pengerjaan Proyek'";
												$query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
															$data = $row['proposal'];
															$data2 = $row['laporan'];
                                                    		echo '<tr>
                                                                <td>'.$row['proyek'].'</td>
                                                                <td>'.$row['inisiator'].'</td>
                                                                <td>'.$row['kumpul'],' hari'.'</td>
                                                                <td>'.$row['kerja'],' bulan'.'</td>
                                                                <td>'.$row['keterangan'].'</td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data\"><i class=\"fa fa-download\"></i> </b>proposal.pdf</b></a></button></td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data2\"><i class=\"fa fa-download\"></i> </b>laporan.pdf</b></a></button></td>
                                                                </tr>';                                                        
                                                    }?>
                                            	</tbody>
                                            </table>
											
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
						</div>
						<div class="panel panel-primary">
                            <div class="panel-heading">
										<h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Proyek Selesai</a>
                        </h4>                           
						</div>
						     <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
              				  <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Proyek</th>
                                                        <th>Inisiator</th>
                                                        <th>Durasi Pendanaan</th>
                                                        <th>Durasi Pengerjaan</th>
                                                        <th>Laporan </th>
														<th>Keuntungan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql = "select * from kegiatan where status='Selesai'";
                                                $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                    {
														$data = $row['proposal'];
                                                            echo "<tr>
                                                                <td>".$row['proyek']."</td>
                                                                <td>".$row['inisiator']."</td>
                                                                <td>".$row['kumpul'],' hari'."</td>
                                                                <td>".$row['kerja'],' bulan'."</td>
                                                                <td><button class=\"btn\" style=\"width:100%\"><a href=\"$data\"><i class=\"fa fa-download\"></i> </b>laporan.pdf</b></a></button></td>
                                                                <td><button class='btn' class='is-active' data-toggle='modal' data-target='#more' data-id=".$row['id'].">Selengkapnya</button></td>
                                                            </tr>";                                                        
                                                    }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
						</div>
						
						
						
                    </div>
                </div>
            </div>
        </div>
		<div class="modal fade" id="more" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><b>Selengkapnya</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-data"></div>
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
            <div class="footer-bottom">
                <div class="container text-right">
                    INVESTANI @ copyrights 2018 - by <a href="http://www.ptpn10.co.id" target="_blank">PTPN X</a>
                </div>
            </div>
        </footer>
        <!-- /.modal -->
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
        <script src="assets/js/jquery-2.2.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Ini merupakan script yang terpenting -->
        <script type="text/javascript">
        $(document).ready(function(){
        $('#more').on('show.bs.modal', function (e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : './less.php',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'getDetail='+ getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
        });
        });
        </script>
    </body>
</html>