<?php if(!empty($_SESSION['namapas']) && ($_SESSION['passpas'])){
?>
    
    <style type="text/css">
        .table-custom {
            display: block;
            max-width: -moz-fit-content;
            max-width: fit-content;
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Riwayat Konsultasi</h5>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-custom" style="width: auto; overflow-x: scroll;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Konsultasi</th>
                        <th>ID Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Waktu Konsultasi</th>
                        <th>Gejala</th>
                        <th>Hasil Konsultasi</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="data-tabel">
                    <?php
                    include "koneksi.php";
                    $s = mysqli_query($kon, "select * from keterangan where nama='$_SESSION[namalengkap]' ORDER BY id_keterangan DESC");
                    $no = 1;
                    while($data = mysqli_fetch_array($s)){
                        $id_keterangan=$data['id_keterangan'];
                        $id_konsultasi=$data['id_konsultasi'];
                        $id_pasien=$data['id_pasien'];
                        $nama=$data['nama'];
                        $tgl_konsultasi=$data['tgl_konsultasi'];
                        $kd_penyakit=$data['kd_penyakit'];
                        $nilai=$data['nilai'];
                        // echo "$sesion";
                        ?>
                
                        <tr>
                        
                            <td align="center"><?php echo "$no" ?></td>
                            <td align="center"><?php echo "$id_konsultasi"; ?></td>
                            <td align="center"><?php echo "$id_pasien"; ?></td>
                            <td align="center"><?php echo "$nama"; ?></td>
                            <td align="center"><?php echo "$tgl_konsultasi"; ?></td>
                            <td>
                                <?php 
                                $sh = mysqli_query($kon, "select * from hasil_konsultasi where konsultasi='$id_konsultasi'");
                                
                                while($dh= mysqli_fetch_array($sh)){
                                    $sg = mysqli_query($kon,"select * from gejala where id_gejala='$dh[id_gejala]'");
                                    $dg = mysqli_fetch_array($sg);
                                    // echo "$raquo; $dg[nm_gejala]<br>";
                                    echo "&#8226; $dg[nm_gejala]<br>";
                                    }
                                ?> 
                            </td>
                            <td> 
                                <?php 
                                    $sp = mysqli_query($kon,"select * from penyakit where kd_penyakit='$kd_penyakit'");
                                    $dp = mysqli_fetch_array($sp);
                                    echo "$dp[nm_penyakit]";
                                ?>
                            </td>
                            <td><?php echo "$nilai";?></td>
                            <td>
                                <a target="_blank" href="cetak.php?id=$id&konsultasi=<?php echo $id_konsultasi;?>" class="btn btn-primary btn-xs">
                                    <i class='icon-printer'></i> Cetak
                                </a>
                                &nbsp;&nbsp;
                                <a onClick="return confirm('Yakin ingin hapus?')" href="?p=hapushasilkonsultasi&hapus=<?php echo $id_keterangan; ?>" class="btn btn-danger btn-xs">
                                    <i class='icon-trash'></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>


<?php }else{
        echo "<script language='javascript'>
        alert('Silahkan login terlebih dahulu untuk melihat hasil konsultasi');
        window.location=('?p=login')</script>";
} ?>