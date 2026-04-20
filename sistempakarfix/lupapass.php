
<?php
include "koneksi.php";
if(isset($_POST['Submit'])){
    $un =$_POST['username'];
    $nm =$_POST['nama'];
    $nhp =$_POST['nohp'];
    $sqlpas = mysqli_query ($kon, "select * from pasien where username='$un' and nm_lengkap='$nm' and no_hp='$nhp'");
    $masuk =mysqli_fetch_array($sqlpas);
    $word = $masuk['password'];
    if (!empty($masuk)){
        echo "<script language=javascript>
            alert('Hai $nm password anda adalah $word');
            window.location=('?p=login')
        </script>";
    }
    else{
        echo "<script language=javascript>
            alert('Hai $nm mohon maaf password anda tidak ditemukan, pastikan semua data diisi dengan benar');
            window.location=('?p=lupapass')
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
                    <h5 class="mb-0">Untuk menemukan password, silahkan isikan data diri anda pada form berikut : </h5>
                    <!-- <span class="d-block text-muted">Isi Formulir Berikut ini</span> -->
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                
                
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="No. HP" name="nohp">
                    <div class="form-control-feedback">
                        <i class="icon-mobile text-muted"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="Submit" value="Cek Password">Cek Password</button>
                </div>
								
                <marquee direction ="left"> <b class="teal">Butuh bantuan menemukan password? hubungi admin melalui 0890991119911 </b></marquee>

            </div>
        </div>
    </form>
    <!-- /login form -->

</div>
