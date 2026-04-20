<?php
include"koneksi.php";

$qcari=mysqli_query($kon,"select * from admin where id_admin='$_GET[edit]'");
$cari=mysqli_fetch_array($qcari);

if(isset($_POST['simpan'])){

    if ($cari['username'] != $_POST['username']){
        $check_username = mysqli_query ($kon, "SELECT * FROM admin WHERE username='$_POST[username]'");
        if (mysqli_num_rows($check_username) > 0){
            echo"<script>
                    alert('Mohon maaf Username sudah digunakan, silahkan gunakan username lain');
                    window.location.href='index.php?p=editadmin&id_admin='".$_POST['id_admin'].";
                </script>";
        }
    }

    if ($_POST['password'] != ""){
	    $simpan = mysqli_query($kon,"update admin set nama='$_POST[nama]', username='$_POST[username]', password='$_POST[password]', roles='$_POST[roles]' where id_admin='$_POST[id_admin]'");
    } else {
	    $simpan = mysqli_query($kon,"update admin set nama='$_POST[nama]', username='$_POST[username]', roles='$_POST[roles]' where id_admin='$_POST[id_admin]'");
    }
	 
	if($simpan){
        echo "<script>
            window.location.href='index.php?p=admin';
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
    							<h5 class="card-title">Edit Data Admin</h5>
    						</div>
    						<hr>
    						<div class="card-body">
    						    <form method="post" id='form-edit' enctype="multipart/form-data">
                                    <input type="hidden" name="id_admin" value="<?php echo $cari['id_admin']; ?>">
    
                                    <fieldset class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Nama</label>
                    			                    <input type="text" class="form-control" name="nama" value="<?php echo $cari['nama']; ?>">
                    			                </div>
                    			            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Username</label>
                    			                    <input type="text" class="form-control" name="username" value="<?php echo $cari['username']; ?>">
                    			                </div>
                    			            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Password</label>
                    			                    <input type="password" class="form-control" name="password">
                                                    <i>*kosongkan jika tidak ingin diganti</i>
                    			                </div>
                    			            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Roles</label>
                    			                    <select class="form-control" name="roles">
                                                        <?php
                                                        if ($cari['roles'] == "admin"){
                                                            $opt_1 = "selected";
                                                            $opt_2 = "";
                                                        } else {
                                                            $opt_1 = "";
                                                            $opt_2 = "selected";    
                                                        }
                                                        ?>
                                                        <!-- <option value="" selected disabled>-- Silahkan Pilih Roles --</option> -->
                                                        <option value="admin" <?php echo $opt_1;?> >ADMIN</option>
                                                        <option value="dokter" <?php echo $opt_2;?> >DOKTER/PERAWAT</option>
                                                    </select>
                    			                </div>
                    			            </div>
                                        </div>
                                        
                                    </fieldset>
                    
                    			    <hr>
                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                            					<a href="index.php?p=admin" class="btn btn-light"><i class="icon-arrow-left52 mr-2"></i> Kembali</a>
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