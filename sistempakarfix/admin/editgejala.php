<?php
include"koneksi.php";
if(isset($_POST['simpan'])){
    $simpan=mysqli_query($kon,"UPDATE gejala set kd_gejala='$_POST[kd_gejala]', nm_gejala='$_POST[nm_gejala]', question='$_POST[question]' , bobot='$_POST[bobot]' where id_gejala='$_POST[id_gejala]'");
     
    if($simpan){
        echo"<script>
            alert('Ubah Data Gejala Berhasil');
            window.location.href='index.php?p=gejala';
        </script>";
    }else{
        echo"<script>
            alert('Ubah Data Gejala Gagal');
        </script>";
    }
}

$qcari=mysqli_query($kon,"select * from gejala where id_gejala='$_GET[edit]'");
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
                                <h5 class="card-title">Edit Data Gejala</h5>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form method="post" id='form-edit' action="" enctype="multipart/form-data">
                                    <input type="hidden" name="id_gejala" value="<?php echo"$cari[id_gejala]"; ?>">
                                    
                                    <fieldset class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Kode Gejala</label>
                                                    <input type="text" class="form-control" name="kd_gejala" value="<?php echo"$cari[kd_gejala]"; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Nama Gejala</label>
                                                    <input type="text" class="form-control" name="nm_gejala" value="<?php echo"$cari[nm_gejala]"; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Pertanyaan Gejala</label>
                                                    <input type="text" class="form-control" name="question" value="<?php echo"$cari[question]"; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Bobot</label>
                                                    <input type="text" class="form-control" name="bobot" value="<?php echo"$cari[bobot]"; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </fieldset>
                    
                                    <hr>
                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="index.php?p=gejala" class="btn btn-light"><i class="icon-arrow-left52 mr-2"></i> Kembali</a>
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