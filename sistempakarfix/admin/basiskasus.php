<div class="content">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="content">
    
    			<div class="row">
    
    				<div class="col-lg-12">
    
                        <div class="card">
    						<div class="card-header header-elements-inline">
    							<h5 class="card-title">Basis Kasus</h5>
    						</div>
    						<hr>
    						<div class="card-body">
    							<table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penyakit</th>
                                        	<th>Nama Gejala</th>
                                        	<th>Edit</th>
                                        	<!--<th>Hapus</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="data-tabel">
                                        <?php
                                       	include "koneksi.php";
                                    	$i = 1;
                                    	$penyakit = mysqli_query($kon, "select * from penyakit GROUP BY kd_penyakit ASC");
                                    	while($r_penyakit = mysqli_fetch_array($penyakit)){
                                    		?>
                                    	    <tr>
                                        		<td><?php echo $i;?></td>
                                                <td><?php echo "$r_penyakit[nm_penyakit] ($r_penyakit[kd_penyakit])";?></td>
                                                <td>
                                                	<?php 
                                        				$sg = mysqli_query($kon,"select * from basis_kasus where kd_penyakit='$r_penyakit[kd_penyakit]'");
                                        				
                                        				while($dg = mysqli_fetch_array($sg)){
                                        					$sp1 = mysqli_query($kon,"select * from gejala where id_gejala='$dg[id_gejala]'");
                                        					$dp1 = mysqli_fetch_array($sp1);
                                        					echo "* $dp1[nm_gejala]<br>";
                                        				}
                                        			?>
                                        		<td><a href="?p=editbasiskasus&kode=<?php echo $r_penyakit['kd_penyakit'];?>">Edit</a></td>
                                                <!-- <td><a onClick="return confirm('Yakin ingin hapus?')" href="?p=hapusbasiskasus&kode=<?php echo $r_penyakit['kd_penyakit'];?>">Hapus</a>
                                                </td> -->
                                    
                                    		</tr>
                                            <?php 
                                    		$i++;
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
	




<!--
<a href="<?php echo"?p=addbasiskasus";?>" class="button"> Tambah Basis Kasus</a>
-->