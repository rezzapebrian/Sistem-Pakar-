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
    						<div class="card-body">
    							<table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Gejala</th>
                                        	<th>Nama Gejala</th>
                                            <th>B1</th>
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
                                        		<td><center>" .$radm['b1']. "</td>
                                        		<td><center><a href='?p=editgejala&edit=$radm[kd_gejala]'>Edit</center><input type='hidden' name'edit' value='".$radm['id_gejala']."'>
                                                    
													<center><a href='?p=hapusgejala&hapus=$radm[kd_gejala]' onClick=\"return confirm('Yakin ingin hapus?')\">Hapus</center><input type='hidden' name'hapus' value='".$radm['id_gejala']."'>
                                                    </td>
                                                -->
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
	