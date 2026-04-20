<?php
include"koneksi.php";
if(isset($_POST['simpan'])){
	$simpan=mysqli_query($kon,"update penyakit set nm_penyakit='$_POST[nm_penyakit]',ket='$_POST[ket]', solusi='$_POST[solusi]' where kd_penyakit='$_POST[kd_penyakit]'");
	 
	if($simpan){
	echo"<script>
		
		window.location.href='index.php?p=penyakit';
	</script>";
	}else{
	echo"<script>
		
		</script>";
	}
}

$qcari=mysqli_query($kon,"select * from penyakit where kd_penyakit='$_GET[edit]'");
$cari=mysqli_fetch_array($qcari);
?>

<div class="content">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="content">
    
    			<div class="row">
    
    				<div class="col-lg-6 offset-lg-3">
    
                        <div class="card">
    						<div class="card-header header-elements-inline">
    							<h5 class="card-title">Edit Data Penyakit</h5>
    						</div>
    						<hr>
    						<div class="card-body">
    						    <form method="post" id='form-edit' enctype="multipart/form-data">
                                    <fieldset class="mb-3">
                                    	<div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Kode Penyakit</label>
                    			                    <input type="text" class="form-control" name="kd_penyakit" value="<?php echo"$cari[kd_penyakit]"; ?>" readonly>
                    			                </div>
                    			            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Nama Penyakit</label>
                    			                    <input type="text" class="form-control" name="nm_penyakit" value="<?php echo"$cari[nm_penyakit]"; ?>">
                    			                </div>
                    			            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Keterangan</label>
                    			                    <input type="text" class="form-control" name="ket" value="<?php echo"$cari[ket]"; ?>">
                    			                </div>
                    			            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Solusi</label>
                    			                    <textarea rows="6" type="text" class="form-control" name="solusi"><?php echo"$cari[solusi]"; ?></textarea>
                    			                </div>
                    			            </div>
                                        </div>
                                        
                                    </fieldset>
                    
                    			    <hr>
                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                            					<a href="index.php?p=penyakit" class="btn btn-light"><i class="icon-arrow-left52 mr-2"></i> Kembali</a>
                            					<button type="submit" class="btn bg-blue" id="btn-edit" name="simpan" value="Simpan">Simpan <i class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </div>
                    				</div>
                    
                                </form>
    						</div>
    					</div>
    				</div>
    
    					
    			</div>
    
    		</div>
    	</div>
    </div>
</div>