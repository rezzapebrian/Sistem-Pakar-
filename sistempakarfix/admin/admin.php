<?php
// include 'koneksi.php';
// echo "USER : ".$_SESSION['namaadm'];
$roles_login = $_SESSION['roles'];
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
							
							<?php if ($roles_login == "admin"){ ?>
							<div class="col-lg-12">
								<div class="d-flex justify-content-between align-items-center">
									<a href="<?php echo"?p=addadmin";?>" class="btn btn-info">
										<i class="icon-plus3 mr-2"></i> Tambah Admin
									</a>
								</div>
							</div>
							<hr>
    						<?php } ?>
							
    						<div class="card-body">
    							<table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                        	<th>username</th>
                                            <th>Roles</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-tabel">
                                        <?php
                                       	include "koneksi.php";
                                       	
                                       	if ($roles_login == "admin"){
                                    	    $sqladm = "select * from admin";
                                       	} else {
                                       	    $sqladm = "select * from admin WHERE roles = 'dokter'";
                                       	}
                                       	
                                    	$admin = mysqli_query($kon, $sqladm);
                                    	$no = 1;
                                    	while($radm = mysqli_fetch_array($admin)){
                                    		if ($radm['roles'] == "admin"){
                                    		    $rolesnya = "ADMIN";
                                    		} else {
                                    		    $rolesnya = "DOKTER/PERAWAT";
                                    		}
                                    		
                                    		echo "<tr>
                                        		<td><center>" .$no. "</td>
                                        		<td>" .$radm['nama']. "</td>
                                        		<td>" .$radm['username']. "</td>
                                        		<td>" .$rolesnya. "</td>";
                                        		if ($roles_login == "admin"){
                                    		        echo "<td><center><a href='?p=editadmin&edit=$radm[id_admin]'>Edit</center><input type='hidden' name'edit' value='".$radm['id_admin']."'>
                                                        <center><a href='?p=hapusadmin&hapus=$radm[id_admin]' onClick=\"return confirm('Yakin ingin hapus?')\">Hapus</center><input type='hidden' name'hapus' value='".$radm['id_admin']."'>
                                                    </td>";
                                        		} else {
                                        		    echo "<td>-</td>";
                                        		}
                                        		echo "
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
	