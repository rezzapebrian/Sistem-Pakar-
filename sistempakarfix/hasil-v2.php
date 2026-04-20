<?php
   // session_start();
   $id = $_GET['id'];
   $konsultasi = $_GET['konsultasi'];        
?>
<!DOCTYPE html>
<html lang="en">

<?php
$bobot_kasus = array();

$penyakit = mysqli_query($kon, "SELECT * from penyakit");
while($r_penyakit = mysqli_fetch_array($penyakit)){
    $kd_penyakit = $r_penyakit['kd_penyakit'];
    $get_bobot_kasus = mysqli_query($kon, "SELECT SUM(b.b1) as bobot FROM basis_kasus as a, gejala as b WHERE a.id_gejala=b.id_gejala AND a.kd_penyakit='$kd_penyakit'");
    $r_get_bobot_kasus = mysqli_fetch_array($get_bobot_kasus);
   
    $bobot_kasus[$kd_penyakit] = $r_get_bobot_kasus['bobot'];

    // echo "KODE : ".$r_penyakit["kd_penyakit"];
    // echo "<br>";
    // echo "Penyakit : ".$r_penyakit["nm_penyakit"];
    // echo "<br>";
    // echo "BOBOT : ".$bobot_kasus[$kd_penyakit];
    // echo "<hr>";

    // echo print_r($bobot_kasus);
    // echo $r_get_bobot_kasus['bobot'];
    // echo $kd_penyakit;
}
?>

<body>   
   <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
      <div>
                
         <form name="form1" method="post" action="">
                         
            <?php
            //PROSES PENYAKIT S-01
            $s1 = mysqli_query($kon,"SELECT * from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-01%') AND konsultasi=$konsultasi");
            $r1 = mysqli_num_rows($s1);

            // $ssum1 = mysqli_query($kon,"SELECT sum(if(a.konsultasi=$konsultasi, a.b1,0)) as j1
            //                         from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-01%')")
            //                         or die(mysqli_error());
            $ssum1 = mysqli_query($kon,"SELECT sum(if(a.konsultasi=$konsultasi, a.b1,0)) as j1
                                    from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-01%')")
                                    or die(mysqli_error());

            $dsum1 = mysqli_fetch_array($ssum1);
            $cek1 = $dsum1['j1'];
            $proses1 = $dsum1['j1'] / $bobot_kasus['S-01'];
            $proses1_ok = number_format($proses1, 2, '.', '');
            $peroa1 = $proses1_ok*100;
            //echo"$cek1";
            
            //PROSES PENYAKIT S-02
            $s2 = mysqli_query($kon,"SELECT * from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-02%') AND konsultasi=$konsultasi");
            $r2 = mysqli_num_rows($s2);
            
            $ssum2 = mysqli_query($kon,"SELECT sum(if(a.konsultasi=$konsultasi, a.b2,0)) as j2
                                    from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-02%')")
                                    or die(mysql_error());
            $dsum2 = mysqli_fetch_array($ssum2);
            $cek2 = $dsum2['j2'];
            $proses2 = $dsum2['j2'] / $bobot_kasus['S-02'];
            $proses2_ok = number_format($proses2, 2, '.', '');
            $peroa2 = $proses2_ok*100;
            //echo"$cek2";

            //PROSES PENYAKIT S-03
            $s3 = mysqli_query($kon,"SELECT * from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-03%') AND konsultasi=$konsultasi");
            $r3 = mysqli_num_rows($s3);

            $ssum3 = mysqli_query($kon,"SELECT sum(if(a.konsultasi=$konsultasi, a.b3,0)) as j3
                                    from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-03%')")
                                    or die(mysqli_error());
            $dsum3 = mysqli_fetch_array($ssum3);
            $cek3=$dsum3['j3'];
            $proses3 = $dsum3['j3'] / $bobot_kasus['S-03'];
            $proses3_ok = number_format($proses3, 2, '.', '');
            $peroa3 = $proses3_ok*100;
            //echo"$cek3";
            //PROSES PENYAKIT S-04
            $s4 = mysqli_query($kon,"SELECT * from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-04%') AND konsultasi=$konsultasi");
            $r4 = mysqli_num_rows($s4);

            $ssum4 = mysqli_query($kon,"SELECT sum(if(a.konsultasi=$konsultasi, a.b4,0)) as j4
                                    from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-04%')")
                                    or die(mysqli_error());
            $dsum4 = mysqli_fetch_array($ssum4);
            $cek4=$dsum4['j4'];
            $proses4 = $dsum4['j4'] / $bobot_kasus['S-04'];
            $proses4_ok = number_format($proses4, 2, '.', '');
            $peroa4 = $proses4_ok*100;
            // echo"$cek4";

            //PROSES PENYAKIT S-05
            $s5 = mysqli_query($kon,"SELECT * from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-05%') AND konsultasi=$konsultasi");
            $r5 = mysqli_num_rows($s5);

            $ssum5 = mysqli_query($kon,"SELECT sum(if(a.konsultasi=$konsultasi, a.b5,0)) as j5
                                    from hasil_konsultasi a where a.id_gejala IN (SELECT b.id_gejala from basis_kasus b where b.kd_penyakit like 'S-05%')")
                                    or die(mysqli_error());
            $dsum5 = mysqli_fetch_array($ssum5);
            $cek5=$dsum5['j5'];
            $proses5 = $dsum5['j5'] / $bobot_kasus['S-05'];

            $proses5_ok = number_format($proses5, 2, '.', '');
            $peroa5 = $proses5_ok*100;
            //echo"$cek5";


            //MEMBANDINGKAN NILAI SIMILARITY DAN MENGAMBIL NILAI YANG PALING TINGGI
            $MAX = max($proses1, $proses2, $proses3, $proses4, $proses5);
            echo "<div  style='margin-top:10px;'>
               <font face='Times New Roman cursive'>Proses Perhitungan
                  <b>
                     <br>
                     Pneumonia : Similiarity = $cek1 / " . $bobot_kasus['S-01'] . " = $proses1_ok x 100 = $peroa1%<br>
                     TBC (Tumberkulosis) : Similiarity = $cek2 / " . $bobot_kasus['S-02'] . " = $proses2_ok x 100 = $peroa2 %<br>
                     Brongkitis : Similiarity = $cek3 / " . $bobot_kasus['S-03'] . " = $proses3_ok x 100 = $peroa3%<br> 
                     Asma  : Similiarity = $cek4 / " . $bobot_kasus['S-04'] . " = $proses4_ok x 100 = $peroa4%<br>
                     PPOK (Penyakit Paru Obstruktif Kronis)   : Similiarity = $cek5 / " . $bobot_kasus['S-05'] . " = $proses5_ok x 100 = $peroa5%<br>
                  </b>
               </font>
            </div>";
                        
            // echo "
            // <div style='margin-top:10px;'>
            //    <font face='Times New Roman, cursive'>
            //       Nama Pasien: <b><u>$dpas[nm_lengkap]</u></b>
            //    </font>
            // </div>";
            

            //MENAMPILKAN HASIL AKHIR
            if($MAX==$proses1){
               $sp = mysqli_query($kon,"SELECT * from penyakit where kd_penyakit LIKE 'S-01%'") or die(mysqli_error());
               $dp = mysqli_fetch_array($sp);
               $spas =  mysqli_query($kon,"SELECT * from pasien where id_user='$id'") or die(mysqli_error());
               $dpas = mysqli_fetch_array($spas);
               
               $nk = mysqli_query($kon,"SELECT * from hasil_konsultasi group by waktu desc limit 1");
               $r = mysqli_fetch_array($nk);
                     
               echo "
               <div style='margin-top:10px;'>
                  <font face='Times New Roman, cursive'>
                     Nama Pasien: <b><u>$dpas[nm_lengkap]</u></b>
                  </font>
               </div>";
               $h = mysqli_query($kon, "SELECT * from hasil_konsultasi where konsultasi='$konsultasi'");

               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Gejala yang dipilih :</font></div>";
               
               while($rh=mysqli_fetch_array($h)){
                  $sg = mysqli_query($kon, "SELECT * from gejala where id_gejala='$rh[id_gejala]'");
                  $rg = mysqli_fetch_array($sg);
                  
                  echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b ><u>$rg[nm_gejala]</u></b></font></div>";
               }
                            
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Berdasarkan gejala yang anda inputkan, kemungkinan anda menderita gejala : <b ><u>$dp[nm_penyakit]</u></b></font></div>";
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b>Saran Pengobatan :</b><br/>$dp[solusi]</font></div>";
               echo "<br><a href='cetak.php?id=$id&konsultasi=$konsultasi' class='btn btn-success btn-lg' >
                           <span class='glyphicon glyphicon-print'></span> Cetak 
                     </a>";
               $ket = mysqli_query($kon,"insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kd_penyakit) values ('$konsultasi', '$_SESSION[namalengkap]', NOW(), '$MAX', '$dp[kd_penyakit]')");
            }
            else if($MAX==$proses2){
               $sp = mysqli_query($kon,"SELECT * from penyakit where kd_penyakit LIKE 'S-02%'") or die(mysqli_error());
               $dp = mysqli_fetch_array($sp);
               $spas =  mysqli_query($kon, "SELECT * from pasien where id_user='$id'") or die(mysqli_error());
               $dpas = mysqli_fetch_array($spas);
               $nk = mysqli_query($kon,"SELECT * from hasil_konsultasi group by waktu desc limit 1");
               $r = mysqli_fetch_array($nk);
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Nama Pasien: <b ><u>$dpas[nm_lengkap]</u></b></font></div>";
               $h = mysqli_query($kon, "SELECT * from hasil_konsultasi where konsultasi='$konsultasi'");
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Gejala yang dipilih :</font></div>";
               while($rh=mysqli_fetch_array($h)){
                  $sg = mysqli_query($kon, "SELECT * from gejala where id_gejala='$rh[id_gejala]'");
                  $rg = mysqli_fetch_array($sg);
                  echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b ><u>$rg[nm_gejala]</u></b></font></div>";
               }
               
               echo "<div  style='margin-top:10px;'><font face='Times New Roman, cursive'>Berdasarkan gejala yang anda inputkan, kemungkinan anda menderita gejala : <b ><u>$dp[nm_penyakit]</u></b></font></div>";
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b>Saran Pengobatan :</b><br/>$dp[solusi]</font></div>";
               echo "<br><a href='cetak.php?id=$id&konsultasi=$konsultasi' class='btn btn-success btn-lg' >
                           <span class='glyphicon glyphicon-print'></span> Cetak 
                     </a>";
               $ket = mysqli_query($kon,"insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kd_penyakit) values ('$konsultasi', '$_SESSION[namalengkap]', NOW(), '$MAX', '$dp[kd_penyakit]')");
            }
            else if($MAX==$proses3){
               $sp = mysqli_query($kon,"SELECT * from penyakit where kd_penyakit LIKE 'S-03%'") or die(mysqli_error());
               $dp = mysqli_fetch_array($sp);
               $spas =  mysqli_query($kon,"SELECT * from pasien where id_user='$id'") or die(mysqli_error());
               $dpas = mysqli_fetch_array($spas);
               $nk = mysqli_query($kon,"SELECT * from hasil_konsultasi group by waktu desc limit 1");
               $r = mysqli_fetch_array($nk);

               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Nama Pasien: <b ><u>$dpas[nm_lengkap]</u></b></font></div>";
               $h = mysqli_query($kon, "SELECT * from hasil_konsultasi where konsultasi='$konsultasi'");
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Gejala yang dipilih :</font></div>";
               while($rh=mysqli_fetch_array($h)){
                  $sg = mysqli_query($kon, "SELECT * from gejala where id_gejala='$rh[id_gejala]'");
                  $rg = mysqli_fetch_array($sg);
                  echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b ><u>$rg[nm_gejala]</u></b></font></div>";
               }

               echo "<div  style='margin-top:10px;'><font face='Times New Roman, cursive'>Berdasarkan gejala yang anda inputkan, kemungkinan anda menderita gejala : <b ><u>$dp[nm_penyakit]</u></b></font></div>";
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b>Saran Pengobatan :</b><br/>$dp[solusi]</font></div>";
               echo "<br><a href='cetak.php?id=$id&konsultasi=$konsultasi' class='btn btn-success btn-lg' >
               <span class='glyphicon glyphicon-print'></span> Cetak 
               </a>";
               $ket = mysqli_query($kon,"insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kd_penyakit) values ('$konsultasi', '$_SESSION[namalengkap]', NOW(), '$MAX', '$dp[kd_penyakit]')");
            }
            else if($MAX==$proses4){
               $sp = mysqli_query($kon,"SELECT * from penyakit where kd_penyakit LIKE 'S-04%'") or die(mysqli_error());
               $dp = mysqli_fetch_array($sp);
               $spas =  mysqli_query($kon,"SELECT * from pasien where id_user='$id'") or die(mysqli_error());
               $dpas = mysqli_fetch_array($spas);
               $nk = mysqli_query($kon,"SELECT * from hasil_konsultasi group by waktu desc limit 1");
               $r = mysqli_fetch_array($nk);

               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Nama Pasien: <b ><u>$dpas[nm_lengkap]</u></b></font></div>";
               $h = mysqli_query($kon, "SELECT * from hasil_konsultasi where konsultasi='$konsultasi'");
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Gejala yang dipilih :</font></div>";
               while($rh=mysqli_fetch_array($h)){
                  $sg = mysqli_query($kon, "SELECT * from gejala where id_gejala='$rh[id_gejala]'");
                  $rg = mysqli_fetch_array($sg);
                  echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b ><u>$rg[nm_gejala]</u></b></font></div>";
               }


               echo "<div  style='margin-top:10px;'><font face='Times New Roman, cursive'>Berdasarkan gejala yang anda inputkan, kemungkinan anda menderita gejala : <b ><u>$dp[nm_penyakit]</u></b></font></div>";
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b>Saran Pengobatan :</b><br/>$dp[solusi]</font></div>";
               echo "<br><a href='cetak.php?id=$id&konsultasi=$konsultasi' class='btn btn-success btn-lg' >
               <span class='glyphicon glyphicon-print'></span> Cetak 
               </a>";
               $ket = mysqli_query($kon,"insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kd_penyakit) values ('$konsultasi', '$_SESSION[namalengkap]', NOW(), '$MAX', '$dp[kd_penyakit]')");
            }
            else if($MAX==$proses5){
               $sp = mysqli_query($kon,"SELECT * from penyakit where kd_penyakit LIKE 'S-05%'") or die(mysqli_error());
               $dp = mysqli_fetch_array($sp);
               $spas =  mysqli_query($kon,"SELECT * from pasien where id_user='$id'") or die(mysqli_error());
               $dpas = mysqli_fetch_array($spas);
               $nk = mysqli_query($kon,"SELECT * from hasil_konsultasi group by waktu desc limit 1");
               $r = mysqli_fetch_array($nk);

               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Nama Pasien: <b ><u>$dpas[nm_lengkap]</u></b></font></div>";
               $h = mysqli_query($kon, "SELECT * from hasil_konsultasi where konsultasi='$konsultasi'");
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Gejala yang dipilih :</font></div>";
               while($rh=mysqli_fetch_array($h)){
                  $sg = mysqli_query($kon, "SELECT * from gejala where id_gejala='$rh[id_gejala]'");
                  $rg = mysqli_fetch_array($sg);
                  echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b ><u>$rg[nm_gejala]</u></b></font></div>";
               }

               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'>Berdasarkan gejala yang anda inputkan, kemungkinan anda menderita gejala : <b ><u>$dp[nm_penyakit]</u></b></font></div>";
               echo "<div style='margin-top:10px;'><font face='Times New Roman, cursive'><b>Saran Pengobatan :</b><br/>$dp[solusi]</font></div>";
               echo "<br><a href='cetak.php?id=$id&konsultasi=$konsultasi' class='btn btn-success btn-lg' >
               <span class='glyphicon glyphicon-print'></span> Cetak 
               </a>";
               $ket = mysqli_query($kon,"insert into keterangan (id_konsultasi, nama, tgl_konsultasi, nilai, kd_penyakit) values ('$konsultasi', '$_SESSION[namalengkap]', NOW(), '$MAX', '$dp[kd_penyakit]')");
            }
            ?>
                    
         </form>
      </div>
         
   </div>


<br><br><br><br>


</body>
</html>