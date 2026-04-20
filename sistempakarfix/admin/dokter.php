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
    							<h5 class="card-title">Dokter</h5>
    						</div>
							<hr>
							
							<?php if ($roles_login == "admin"){ ?>
							<div class="col-lg-12">
								<div class="d-flex justify-content-between align-items-center">
									<a href="<?php echo"?p=adddokter";?>" class="btn btn-info">
										<i class="icon-plus3 mr-2"></i> Tambah Dokter
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
                                            <th>username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                        	<th>Alamat</th>
                                        	<th>No. HP</th>
                                        	<th>Email</th>
                                        	<th>Spesialis</th>
                                        	<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-tabel">
                                        <?php
                                       	include "koneksi.php";
                                       	
                                       	// if ($roles_login == "dokter"){
                                    	    $sqladm = "select * from dokter";
                                       	// } else {
                                       	//     $sqladm = "select * from dokter WHERE roles = 'dokter'";
                                       	// }
                                       	
                                    	$dokter = mysqli_query($kon, $sqladm);
                                    	$no = 1;
                                    	while($r_dokter = mysqli_fetch_array($dokter)){
                                    		echo "<tr>
                                                <td>" .$r_dokter['id_dokter']. "</td>
                                                <td>" .$r_dokter['username']. "</td>
                                        		<td>" .$r_dokter['nm_lengkap']. "</td>
                                        		<td>" .$r_dokter['jns_kelamin']. "</td>
                                        		<td>" .$r_dokter['alamat']. "</td>
                                        		<td>" .$r_dokter['no_hp']. "</td>
                                        		<td>" .$r_dokter['email']. "</td>
                                        		<td>" .$r_dokter['spesialis']. "</td>";
                                        		if ($roles_login == "admin"){
                                    		        echo "<td><center><a href='?p=editdokter&edit=$r_dokter[id_dokter]'>Edit</center><input type='hidden' name'edit' value='".$r_dokter['id_dokter']."'>
                                                        <center><a href='?p=hapusdokter&hapus=$r_dokter[id_dokter]' onClick=\"return confirm('Yakin ingin hapus?')\">Hapus</center><input type='hidden' name'hapus' value='".$r_dokter['id_dokter']."'>
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
	