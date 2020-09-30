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
<!-- Modal -->
<form class="form-donation" action="cek-selesai.php" method="post"">
    <div class="row">
        <div class="col-lg-12">
            <!--Timeline -->
            <div class="panel-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i>&nbsp;  Keuntungan
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Total Keuntungan</th>
                                                <th>Investor</th>
                                                <th>Inisiator</th>
                                                <th>Pengelola</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php
                                                    $sql = "select * from kegiatan where id = '$id'";
                                                    $inv = 0;
                                                    $in = 0;
                                                    $peng = 0;
                                                    $nama = "";
                                                    $namaIn = "";
                                                    $namaPeng = "";
                                                    $totSaham = 0;
                                                    $query = mysqli_query($db, $sql);
                                                    while ($row = mysqli_fetch_array($query))
                                                        {
                                                            $inv = 0.75 * $row['Untung'];
                                                            $in = 0.05 * $row['Untung'];
                                                            $peng = 0.20 * $row['Untung'];
                                                            $nama = $row['proyek'];
                                                            $namaIn = $row['inisiator'];
                                                            $namaPeng = $row['pengelola'];
                                                            $totSaham = $row['jumlahsaham'];

                                                                echo '<tr>
                                                                <td>'."Rp ", number_format($row['Untung'],0,',','.').'</td>
                                                                <td>'."Rp ", number_format($inv,0,',','.').'</td>
                                                                <td>'."Rp ", number_format($in,0,',','.').'</td>
                                                                <td>'."Rp ", number_format($peng,0,',','.').'</td>
                                                            </tr>';

                                                            
                                                                                                                    
                                                    }
                                                    echo "<input type=\"hidden\" name=\"proyek\" value=\"$nama\">";
                                                    echo "<input type=\"hidden\" name=\"namaIn\" value=\"$namaIn\">";
                                                    echo "<input type=\"hidden\" name=\"namaPeng\" value=\"$namaPeng\">";
                                                    echo "<input type=\"hidden\" name=\"total\" value=\"$totSaham\">";
                                                    echo "<input type=\"hidden\" name=\"inv\" value=\"$inv\">";
                                                    echo "<input type=\"hidden\" name=\"in\" value=\"$in\">";
                                                    echo "<input type=\"hidden\" name=\"peng\" value=\"$peng\">";
                                                    ?>
                                                </tbody>

                                    </table>
                                        
                                        <input type="submit" value="Selesai" class="btn btn-primary">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>