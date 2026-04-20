<?php
session_start();
include "koneksi.php";
$kode = $_GET['kode'];
// $sql	= mysqli_query($kon,"select * from basis_kasus where kd_penyakit='$kode'");
// $data	= mysqli_fetch_array($sql);
// if(mysqli_num_rows($sql) > 0){
//     $id_gejala= $data['id_gejala'];
    ?>


    <div class="content">
        <div class="row">
        	<div class="col-lg-12">
        		<div class="content">
        
        			<div class="row">
        
        				<div class="col-lg-6 offset-lg-3">
        
                            <div class="card">
        						<div class="card-header header-elements-inline">
        							<h5 class="card-title">Edit Basis Kasus</h5>
        						</div>
        						<hr>
        						<div class="card-body">
        						    <form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
        						        <fieldset class="mb-3">
                                        	<div class="row">
                                                <div class="col-lg-12">
                        			                <div class="form-group">
                        			                    <label>Nama Penyakit</label>
                        			                    <select class="form-control" name="kd_penyakit" id="kd_penyakit" onchange="gantiPenyakit(this.value)">
                            								<?php
                            									$sp0 = mysqli_query($kon,"select * from penyakit where kd_penyakit='$kode'");
                            									if($dp0 = mysqli_fetch_array($sp0)){
                                                            		echo "<option value='$kode'>$kode == $dp0[nm_penyakit]</option>";
                            									}
                            								?>
                                                            <?php
                                                                $sp = mysqli_query($kon,"select * from penyakit");
                                                                while($dp = mysqli_fetch_array($sp)){
                            										echo "<option value=$dp[kd_penyakit]>$dp[kd_penyakit] == $dp[nm_penyakit]</option>";
                            									}
                                                            ?>
                                                        </select>
                        			                </div>
                        			            </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-12">
                        			                <div class="form-group">
                        			                    <label>Gejala</label>
                        			                    <br>
                        			                    <?php
                                                        	$sg = mysqli_query($kon,"select * from gejala");
                            								while($dg = mysqli_fetch_array($sg)){
                                                                $cek_gejala = mysqli_query($kon,"select * from basis_kasus where kd_penyakit='$kode' AND id_gejala='$dg[id_gejala]'");
                                                                if(mysqli_num_rows($cek_gejala) > 0){
                                                                echo "<input type='checkbox' name='item[]' id_gejala='item[]' value='$dg[id_gejala]' checked>";
                                                                } else {   
                                                                echo "<input type='checkbox' name='item[]' id_gejala='item[]' value='$dg[id_gejala]'>";
                                                                }

                            									echo "  $dg[kd_gejala] == $dg[nm_gejala]<br>";
                            								}
                            							?>
                        			                </div>
                        			            </div>
                                            </div>
                                            
                                        </fieldset>
                        
                        			    <hr>
                        
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between align-items-center">
                                					<button class="btn btn-light" name="batal" type="submit" id="batal" value="Batal">Batal</button>
                                                	<button class="btn bg-blue" name="simpan" type="submit" id="simpan" value="Simpan">Simpan</button>
                                                </div>
                                            </div>
                        				</div>
                        				
                                        
                                        <?php 
                                        // }
                    					include "koneksi.php";
                    						if(isset($_POST['simpan'])){
                    							mysqli_query($kon, "delete from basis_kasus where kd_penyakit='$kode'") or die(mysqli_error());
                    							
                    							$jumlah = count($_POST['item']);
                    							
                    							for($i=0; $i < $jumlah; $i++){
                    								$gejala=$_POST['item'][$i];
                    								
                    								
                    								$q=mysqli_query($kon,"insert into basis_kasus(kd_penyakit, id_gejala) values ('$_POST[kd_penyakit]', '$gejala')") or die(mysqli_error());
                    							}
                    								
                    								if($q){
                    									echo "<script language=javascript> alert('Data Berhasil Disimpan');
                    											window.location='?p=basiskasus'</script>";
                    								}
                    								else{
                    									echo "Data Gagal Di Simpan";
                    									echo "Silahkan <a href = '?p=basiskasus'>Ulangi Disini</a>";
                    								}
                    						}
                    						
                    						if(isset($_POST['batal'])){
                    							echo "<script language=javascript>
                    								window.location='?p=basiskasus';
                    								</script>";
                    							exit;
                    						}
                    					?>
                                    </form>
        						</div>
        					</div>
        				</div>
        
        					
        			</div>
        
        		</div>
        	</div>
        </div>
    </div>

    <script type="text/javascript">
        function gantiPenyakit(id){
            // alert(id);
            window.location.href = 'index.php?p=editbasiskasus&kode=' + id;
        }
    </script>

