<?php
include"koneksi.php";

$qcari=mysqli_query($kon,"select * from dokter where id_dokter='$_GET[edit]'");
$cari=mysqli_fetch_array($qcari);

if(isset($_POST['simpan'])){

    if ($cari['username'] != $_POST['username']){
        $check_username = mysqli_query ($kon, "SELECT * FROM dokter WHERE username='$_POST[username]'");
        if (mysqli_num_rows($check_username) > 0){
            echo"<script>
                    alert('Mohon maaf Username sudah digunakan, silahkan gunakan username lain');
                    window.location.href='index.php?p=editdokter&id_dokter='".$_POST['id_dokter'].";
                </script>";
        }
    }

    if ($_POST['password'] != ""){
	    $simpan = mysqli_query($kon,"update dokter set username='$_POST[username]', password='$_POST[password]', nm_lengkap='$_POST[nm_lengkap]', jns_kelamin='$_POST[jns_kelamin]', alamat='$_POST[alamat]', no_hp='$_POST[no_hp]', email='$_POST[email]', spesialis='$_POST[spesialis]' where id_dokter='$_POST[id_dokter]'");
    } else {
	    $simpan = mysqli_query($kon,"update dokter set username='$_POST[username]', nm_lengkap='$_POST[nm_lengkap]', jns_kelamin='$_POST[jns_kelamin]', alamat='$_POST[alamat]', no_hp='$_POST[no_hp]', email='$_POST[email]', spesialis='$_POST[spesialis]' where id_dokter='$_POST[id_dokter]'");
	}
	 
	if($simpan){
        echo "<script>
            window.location.href='index.php?p=dokter';
        </script>";
	}else{
        echo "<script>
            </script>";
	}
}

?>

<div class="content">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="content">
    
    			<div class="row">
    
    				<div class="col-lg-6 offset-lg-3">
    
                        <div class="card">
    						<div class="card-header header-elements-inline">
    							<h5 class="card-title">Edit Data Dokter</h5>
    						</div>
    						<hr>
    						<div class="card-body">
    						    <form method="post" id='form-edit' enctype="multipart/form-data">
                                    <input type="hidden" name="id_dokter" value="<?php echo $cari['id_dokter']; ?>">
    
                                    <fieldset class="mb-3">

                                        <label>ID Dokter</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" name="id_dokter" value="<?php echo $cari['id_dokter']; ?>" readonly>
                                            <div class="form-control-feedback">
                                                <i class="icon-lock text-muted"></i>
                                            </div>
                                        </div>

                                        <label>Username</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $cari['username']; ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>

                                        <label>Password</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                            <div class="form-control-feedback">
                                                <i class="icon-lock2 text-muted"></i>
                                            </div>
                                            <i>*kosongkan jika tidak ingin diubah</i>
                                        </div>
                                        
                                        <label>Nama Lengkap</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nm_lengkap" value="<?php echo $cari['nm_lengkap']; ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jns_kelamin">
                                                <?php
                                                if ($cari['jns_kelamin'] == "L"){
                                                    $opt_1 = "selected";
                                                    $opt_2 = "";
                                                } else {
                                                    $opt_1 = "";
                                                    $opt_2 = "selected";    
                                                }
                                                ?>
                                                <option disabled>Silahkan dipilih</option>
                                                <option value="L" <?php echo $opt_1;?> >Laki-Laki</option>
                                                <option value="P" <?php echo $opt_2;?> >Perempuan</option>
                                            </select>
                                        </div>

                                        <label>Alamat</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $cari['alamat']; ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-map text-muted"></i>
                                            </div>
                                        </div>
                                        
                                        <label>No. HP</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="No. HP" name="no_hp" value="<?php echo $cari['no_hp']; ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-mobile text-muted"></i>
                                            </div>
                                        </div>

                                        <label>Email</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $cari['email']; ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-envelope text-muted"></i>
                                            </div>
                                        </div>
                                        
                                        <label>Spesialis</label>
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Spesialis" name="spesialis" value="<?php echo $cari['spesialis']; ?>">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-tie text-muted"></i>
                                            </div>
                                        </div>
                                        
                                    </fieldset>
                    
                    			    <hr>
                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                            					<a href="index.php?p=dokter" class="btn btn-light"><i class="icon-arrow-left52 mr-2"></i> Kembali</a>
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