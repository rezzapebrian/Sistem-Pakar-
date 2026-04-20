<?php
include"koneksi.php";
if(isset($_POST['Submit'])){
	//================ GENERATE ID OTOMATIS =========================
	$query_cid = mysqli_query($kon, "SELECT max(right(id_dokter, 6))+1 as rid_cid from dokter");
	$sql_cid = mysqli_fetch_array($query_cid);
	$id_cid = $sql_cid['rid_cid'];
	$itung = strlen($id_cid);
	
	if ($itung==6){
		$id_up = $id_cid;
	} else if($itung==5){
		$id_up = "0".$id_cid;
	} else if($itung==4){
		$id_up = "00".$id_cid;
	} else if($itung==3){
		$id_up = "000".$id_cid;
	} else if($itung==2){
		$id_up = "0000".$id_cid;
	} else if($itung==1){
		$id_up = "00000".$id_cid;
	} else {
		$id_up = "000001";
	}

	$id_oto = "DTR-".$id_up;
	//=============END GENERATE ID OTOMATIS =========================
	
    $check_username = mysqli_query ($kon, "SELECT * FROM dokter WHERE username='$_POST[username]'");
    if (mysqli_num_rows($check_username) > 0){
        echo"<script>
                alert('Mohon maaf Username sudah digunakan, silahkan gunakan username lain');
                window.location.href='index.php?p=adddokter';
            </script>";
    } else {
        $dokter = mysqli_query($kon,"INSERT into dokter values ('$id_oto', '$_POST[username]','$_POST[password]','$_POST[nm_lengkap]', '$_POST[jns_kelamin]', '$_POST[alamat]', '$_POST[no_hp]', '$_POST[email]', '$_POST[spesialis]')");
        if($dokter){
            // echo "Disimpan";
            echo"<script>
                window.location.href='index.php?p=dokter';
            </script>";
        }else{
            // echo "Gagal menyimpan";
            echo"<script>
                window.location.href='index.php?p=dokter';
            </script>";
        }
    }

	
	if($simpan){
		echo "<script>
			alert('Tambah Dokter Berhasil!!');
			window.location.href='index.php?p=logindokter';
		</script>";
	}else{
		echo "<script>
			alert('Tambah Dokter Gagal!!')
			window.location.href='index.php?p=registrasi_dokter';
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
    							<h5 class="card-title">Tambah Data Dokter</h5>
    						</div>
    						<hr>
    						<div class="card-body">
    						    <!-- <form method="post" id='form-edit' action="<?php echo "?p=adddokteraksi"; ?>" enctype="multipart/form-data"> -->
    						    <form method="post" id='form-edit' enctype="multipart/form-data">
                                    <fieldset class="mb-3">
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Username" name="username">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>
    
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                            <div class="form-control-feedback">
                                                <i class="icon-lock2 text-muted"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nm_lengkap">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jns_kelamin">
                                                <option selected disabled>Silahkan dipilih</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
    
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                                            <div class="form-control-feedback">
                                                <i class="icon-map text-muted"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="No. HP" name="no_hp">
                                            <div class="form-control-feedback">
                                                <i class="icon-mobile text-muted"></i>
                                            </div>
                                        </div>
    
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Email" name="email">
                                            <div class="form-control-feedback">
                                                <i class="icon-envelope text-muted"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group form-group-feedback form-group-feedback-left">
                                            <input type="text" class="form-control" placeholder="Spesialis" name="spesialis">
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
                            					<button type="submit" class="btn bg-blue" id="btn-edit" name="Submit" value="Submit">Simpan <i class="icon-paperplane ml-2"></i></button>
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