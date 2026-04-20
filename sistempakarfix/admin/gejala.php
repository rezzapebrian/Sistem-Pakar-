<?php
// include 'koneksi.php';
// echo "USER : ".$_SESSION['namaadm'];
?>
<div class="content">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="content">
    
    			<div class="row">
    
    				<div class="col-lg-12">
    
                        <div class="card">
    						<div class="card-header header-elements-inline">
    							<h5 class="card-title">Gejala</h5>
    						</div>
							<hr>
							<div class="col-lg-12">
								<div class="d-flex justify-content-between align-items-center">
									<a href="<?php echo"?p=addgejala";?>" class="btn btn-info">
										<i class="icon-plus3 mr-2"></i> Tambah Gejala
									</a>
								</div>
							</div>
							<hr>
    						<div class="card-body">
    							<table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Gejala</th>
                                        	<th>Nama Gejala</th>
                                            <th>Bobot</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-tabel">
                                        <?php
                                       	include "koneksi.php";
                                    	$sqladm = "select * from gejala";
                                    	$gejala = mysqli_query($kon, $sqladm);
                                    	$no = 1;
                                    	while($radm = mysqli_fetch_array($gejala)){
                                    		echo "<tr>
                                        		<td><center>" .$no. "</td>
                                        		<td><center>" .$radm['kd_gejala']. "</td>
                                        		<td>" .$radm['nm_gejala']. "</td>
                                        		<td><center>" .$radm['bobot']. "</td>
                                        		<td><center><a href='?p=editgejala&edit=$radm[id_gejala]'>Edit</center><input type='hidden' name'edit' value='".$radm['id_gejala']."'>
                                                    <center><a href='?p=hapusgejala&hapus=$radm[id_gejala]' onClick=\"return confirm('Yakin ingin hapus?')\">Hapus</center><input type='hidden' name'hapus' value='".$radm['id_gejala']."'>
                                                    </td>
                                    		</tr>";
                                    	
                                    		$no++;
                                		}
                                		?>
                                    	
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
	