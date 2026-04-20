<?php
include"koneksi.php";
if(isset($_POST['simpan'])){
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
	
	$simpan=mysqli_query($kon,"INSERT into dokter values ('$id_oto', '$_POST[username]','$_POST[password]','$_POST[nm_lengkap]', '$_POST[jns_kelamin]', '$_POST[alamat]', '$_POST[no_hp]', '$_POST[email]', '$_POST[spesialis]')");
	
	if($simpan){
		echo "<script>
			alert('Registrasi Berhasil, Silahkan Login!!');
			window.location.href='index.php?p=logindokter';
		</script>";
	}else{
		echo "<script>
			alert('Registrasi Gagal, Silahkan Coba Lagi!!')
			window.location.href='index.php?p=registrasi_dokter';
		</script>";
	}
}
?>

<div class="content d-flex justify-content-center align-items-center">

    <!-- Login form -->
    <form class="login-form" method="POST" action="">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <h5 class="mb-0">REGISTRASI DOKTER</h5>
                    <span class="d-block text-muted">Isi Formulir Berikut ini</span>
                </div>

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

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="simpan" value="simpan">Simpan <i class="icon-floppy-disk ml-2"></i></button>
                </div>

            </div>
        </div>
    </form>
    <!-- /login form -->

</div>
