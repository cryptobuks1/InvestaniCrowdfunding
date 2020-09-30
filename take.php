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

?>
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" type="text/css">
            <!-- Modal -->
              <form class="form-donation" action="cek-peng.php" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--Timeline -->
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <i class="fa fa-bar-chart-o fa-fw"></i>&nbsp; Keuntungan 
                                                </div> <br>
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
                                                        <label class="col-md-4 control-label">Upload File:</label>
                                                        <div class="col-md-8">
                                                            <input type="file" name="laporan">
                                                        </div>
                                                    </div>
                                                        <div class="form-group"><br><br><br><br>
                                                        <h5>*) Anda harus menginputkan keuntungan total dari proyek</h5>
                                                        <h5>*) Keuntungan yang anda inputkan harus jujur dan sebenar-benarnya</h5>
                                                        <h5>*) Segala bentuk kecurangan akan diproses sesuai hukum dan undang-undang</h5>
                                                        <h5>*) Keuntungan akan dibagikan kepada semua stakeholder maks 7x24 jam</h5> 
                                                    </div>
                                                    <?php
                                                      echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
                                                      ?>
                                                    
                                                        <label class="col-md-4 control-label"></label>
                                                        <div class="col-md-8 col-md-offset-4"><br>
                                                            <a href="dashboard-cf-pe.php" class="btn btn-primary">Batal</a>
                                                            <input type="submit" value="Selesai" class="btn btn-primary">
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