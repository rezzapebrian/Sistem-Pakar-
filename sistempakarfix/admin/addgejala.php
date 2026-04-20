<?php
include"koneksi.php";
// echo "USER : ".$_SESSION['namaadm'];

if(isset($_POST['simpan'])){
    $simpan=mysqli_query($kon,"insert into gejala values (null, '$_POST[kd_gejala]','$_POST[nm_gejala]','$_POST[question]',$_POST[bobot])");
    
    if($simpan){
    echo"<script>
        alert('Input Gejala Berhasil');
        window.location.href='index.php?p=gejala';
    </script>";
    }else{
    echo"<script>
        alert('Input Gejala Gagal');
        window.location.href='index.php?p=gejala';
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
                                <h5 class="card-title">Tambah Data Gejala</h5>
                            </div>
                            <hr>
                            <div class="card-body">
                                <form method="post" id='form-edit' action="" enctype="multipart/form-data">
                                    <fieldset class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Kode Gejala</label>
                                                    <input type="text" class="form-control" name="kd_gejala">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Nama Gejala</label>
                                                    <input type="text" class="form-control" name="nm_gejala">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Pertanyaan Gejala</label>
                                                    <input type="text" class="form-control" name="question">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Bobot</label>
                                                    <input type="text" class="form-control" name="bobot">
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