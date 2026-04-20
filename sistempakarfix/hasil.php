<?php
// session_start();
$id = $_GET['id'];
$konsultasi = $_GET['konsultasi'];        

$bobot_kasus = array();
$rumus_cek = array();
$rumus_proses = array();
$rumus_proses_ok = array();
$rumus_peroa = array();

$penyakit = mysqli_query($kon, "SELECT * from penyakit");
while($r_penyakit = mysqli_fetch_array($penyakit)){
    $kd_penyakit = $r_penyakit['kd_penyakit'];
    $get_bobot_kasus = mysqli_query($kon, "SELECT SUM(b.bobot) as bobot FROM basis_kasus as a, gejala as b WHERE a.id_gejala=b.id_gejala AND a.kd_penyakit='$kd_penyakit'");
    $r_get_bobot_kasus = mysqli_fetch_array($get_bobot_kasus);
   
    $bobot_kasus[$kd_penyakit] = $r_get_bobot_kasus['bobot'];
}
?>
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Hasil Konsultasi</h5>
    </div>
    <hr>
    <div class="card-body">
        <form name="form1" method="post" action="">
            <div style='margin-top:10px; font-size: 14px;'>
                <font face='Times New Roman, cursive'>
                    ID Konsultasi : <b><u><?php echo $konsultasi; ?></u></b>
                </font>
            </div>
			<br>
            <?php
            $penyakit = mysqli_query($kon, "SELECT * from penyakit");
            while($r_penyakit = mysqli_fetch_array($penyakit)){
                //PROSES PENYAKIT
                $kd_penyakit = $r_penyakit['kd_penyakit'];

                $s1 = mysqli_query($kon, "SELECT * from hasil_konsultasi a WHERE a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit = '$kd_penyakit') AND konsultasi = '$konsultasi'");
                $r1 = mysqli_num_rows($s1);

                $ssum1 = mysqli_query($kon, "SELECT sum(if(a.konsultasi='$konsultasi', a.bobot,0)) as j1
                                        from hasil_konsultasi a 
                                        where 
                                            a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit = '$kd_penyakit')")
                                        or die(mysqli_error());

                $dsum1 = mysqli_fetch_array($ssum1);
                $cek1 = $dsum1['j1'];
                $proses1 = $dsum1['j1'] / $bobot_kasus[$kd_penyakit];
                $proses1_ok = number_format($proses1, 2, '.', '');
                $peroa1 = $proses1_ok * 100;

                $rumus_cek[$kd_penyakit] = $cek1;
                $rumus_proses[$kd_penyakit] = $proses1;
                $rumus_proses_ok[$kd_penyakit] = $proses1_ok;
                $rumus_peroa[$kd_penyakit] = $peroa1;

            }
            
            //MEMBANDINGKAN NILAI SIMILARITY DAN MENGAMBIL NILAI YANG PALING TINGGI
            echo "
            <div>
                <font face='Times New Roman cursive'>
                    <p style='font-size: 14px;'>Proses Perhitungan</p>
                    <p style='margin-left: 18px;'>
                        <b>";
                        $penyakit = mysqli_query($kon, "SELECT * from penyakit");
                        while($r_penyakit = mysqli_fetch_array($penyakit)){
                            $kd_penyakit = $r_penyakit['kd_penyakit'];

                            echo $r_penyakit['nm_penyakit']." : Similiarity = ".$rumus_cek[$kd_penyakit]." / ".$bobot_kasus[$kd_penyakit]." = ".$rumus_proses_ok[$kd_penyakit]." x 100 = ".$rumus_peroa[$kd_penyakit]."<br>";
                        }
                        echo "
                        </b>
                    </p>
                </font>
            </div>";
                        
            //MENAMPILKAN HASIL AKHIR
            $MAX = max(array_values($rumus_proses));

            $penyakit = mysqli_query($kon, "SELECT * from penyakit");
            while($r_penyakit = mysqli_fetch_array($penyakit)){
                $kd_penyakit = $r_penyakit['kd_penyakit'];

                if($MAX == $rumus_proses[$kd_penyakit]){
                    $sp = mysqli_query($kon,"SELECT * from penyakit where kd_penyakit = '$kd_penyakit'") or die(mysqli_error());
                    $dp = mysqli_fetch_array($sp);
                    $spas =  mysqli_query($kon,"SELECT * from pasien where id_user='$id'") or die(mysqli_error());
                    $dpas = mysqli_fetch_array($spas);
                   
                    $nk = mysqli_query($kon, "SELECT * from hasil_konsultasi group by waktu desc limit 1");
                    $r = mysqli_fetch_array($nk);
                         
                    echo "
                    <div style='margin-top:10px; font-size: 14px;'>
                        <font face='Times New Roman, cursive'>
							ID Pasien : <b><u>$id</u></b><br>
                            Nama Pasien: <b><u>$dpas[nm_lengkap]</u></b>
                        </font>
                    </div>";

                    $h = mysqli_query($kon, "SELECT * from hasil_konsultasi where konsultasi='$konsultasi'");

                    echo "<div style='margin-top:10px; font-size: 14px;'><font face='Times New Roman, cursive'>Gejala yang dipilih :</font></div>";
                    echo "<div style='margin-left: 18px;'>";
                    while($rh=mysqli_fetch_array($h)){
                        $sg = mysqli_query($kon, "SELECT * from gejala where id_gejala='$rh[id_gejala]'");
                        $rg = mysqli_fetch_array($sg);
                      
                        echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b ><u>$rg[nm_gejala]</u></b></font></div>";
                    }
                    echo "</div>";

                    echo "<div style='margin-top:10px; font-size: 14px;'><font face='Times New Roman, cursive'>Berdasarkan gejala yang anda inputkan, kemungkinan anda menderita gejala : <b ><u>$dp[nm_penyakit]</u></b></font></div>";
                    echo "
                    <div style='margin-top:10px; font-size: 14px;'>
                        <font face='Times New Roman, cursive'>
                            <b>Saran Pengobatan :</b>
                            <br/>
                            <p style='font-size: 12px; margin-left: 18px;'>
                                $dp[solusi]
                            </p>
                        </font>
                    </div>";
                    echo "<br><a href='cetak.php?id=$id&konsultasi=$konsultasi' class='btn btn-success btn-lg' >
                               <span class='glyphicon glyphicon-print'></span> Cetak 
                         </a>";

                    $check_data = mysqli_query($kon, "SELECT * FROM keterangan WHERE id_konsultasi = '$konsultasi'");
                    $r_cd = mysqli_num_rows($check_data);
                    if ($r_cd == 0) {
                        $ket = mysqli_query($kon,"insert into keterangan (id_konsultasi, id_pasien, nama, tgl_konsultasi, nilai, kd_penyakit) values ('$konsultasi', '$id', '$_SESSION[namalengkap]', NOW(), '$MAX', '$dp[kd_penyakit]')");
                    }
                    
                }
            }
            ?>
        </form>
    </div>
</div>
