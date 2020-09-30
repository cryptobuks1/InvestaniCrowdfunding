<?php
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'db_investani');
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
if ($db->connect_error) {
    die("Could not connect to database: " . $db->connect_error);
}

$id = $_POST['getDetail'];
$sql = mysqli_query($db, "SELECT * from kegiatan where id='$id'");
$row = mysqli_fetch_array($sql);
$_SESSION['proyek']= $row['proyek'];
$_SESSION['danasisa'] = $row['danasisa'];
?>
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" type="text/css">
            <!-- Modal -->
              <form class="form-donation" action="cek_ambildana.php" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--Timeline -->
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i>&nbsp; Pencairan Dana 
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Ambil:</label>
                                                        <div class="col-md-8">
                                                            <div class='input-group date' id='dtp_icon'>
                                                                <input name="tanggalAmbil" type="text" class="form-control" id="input_dtp_icon">
                                                                    <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                            </div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Uang:</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                              <span class="input-group-addon" id="basic-addon1">Rp</span>
                                                              <input type="text" class="form-control" id="inputku" name="jumlah" placeholder="Contoh : 2.000.000" aria-describedby="basic-addon1 return numbersonly(this, event);" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                                                            </div> <br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Deskripsi:</label>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi Pencairan Dana"> <br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Upload File:</label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="foto">
                                                        </div>
                                                    </div>
                                                    <?php
                                                      $namaProyek = $_SESSION['proyek'];
                                                      $danaSisa = $_SESSION['danasisa'];
                                                      echo "<input type=\"hidden\" name=\"namaProyek\" value=\"$namaProyek\">";
                                                      echo "<input type=\"hidden\" name=\"danaSisa\" value=\"$danaSisa\">";
                                                      ?>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"></label>
                                                        <div class="col-md-8 col-md-offset-4">
                                                            <input type="submit" value="Ambil" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                            <!--End simple table example -->
                                        </div>
                                    </div>
                                </div>
                                <!--End Timeline -->
                            </div>
                        </form>
                        <script type="text/javascript" src="assets/js/my.js"></script> 
                        <script src="assets/js/moment.js"></script>
                        <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
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