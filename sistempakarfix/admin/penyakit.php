<div class="content">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="content">
    
    			<div class="row">
    
    				<div class="col-lg-12">
    
                        <div class="card">
    						<div class="card-header header-elements-inline">
    							<h5 class="card-title">Penyakit</h5>
    						</div>
    						<hr>
							<div class="col-lg-12">
								<div class="d-flex justify-content-between align-items-center">
									<a href="<?php echo"?p=addpenyakit";?>" class="btn btn-info">
										<i class="icon-plus3 mr-2"></i> Tambah Penyakit
									</a>
								</div>
							</div>
							<hr>
    						<div class="card-body">   
    							<table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Penyakit</th>
                                        	<th>Nama Penyakit</th>
                                            <th>Keterangan Penyakit</th>
                                            <th>Solusi</th>
                                        	<th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-tabel">
                                        <?php
                                       	include "koneksi.php";
                                    	$sqladm = "select * from penyakit";
                                    	$penyakit = mysqli_query($kon, $sqladm);
                                    	$no = 1;
                                    	while($radm = mysqli_fetch_array($penyakit)){
                                    		echo "<tr>
                                    		
                                        		<td>" .$no. "</td>
                                        		<td>" .$radm['kd_penyakit']. "</td>
                                        		<td>" .$radm['nm_penyakit']. "</td>
                                        		<td>" .$radm['ket']. "</td>
                                        		<td>".$radm['solusi']."</td>
                                        
                                        		<td>
                                        		    <center>
                                        		        <a href='?p=editpenyakit&edit=$radm[kd_penyakit]'>Edit</center><input type='hidden' name'edit' value='".$radm['kd_penyakit']."'>
														
														<a onClick=\"return confirm('Yakin ingin hapus?')\" href='?p=hapuspenyakit&hapus=$radm[kd_penyakit]'>Hapus</center><input type='hidden' name'hapus' value='".$radm['kd_penyakit']."'>
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

<!-- <a href="<?php echo"?p=addpenyakit";?>" class="button"> Tambah Penyakit</a> -->
   