<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<body>  
<?php if(!empty($_SESSION['namapas']) && ($_SESSION['passpas'])){
?>
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
            <div>
                
                
                <div style="margin-top:10px">
                    <form name="form1" method="post" action="">
                        <table class="table table-condensed table-hover">
                        <div id="view"><h3 align="center" class="teal"> Silahkan jawab pertanyaan berikut ini untuk memeriksa gejala yang anda rasakan</h3></div>
                            <?php 
                                $sg = mysqli_query($kon,"SELECT * from gejala");
                                while($dg = mysqli_fetch_array($sg)){
                                    echo
                                    "<tr>
                                        <td class='text-center' width='2%'><input type='checkbox' name='item[]' id_gejala='item[]' value='$dg[id_gejala]'></td>
                                        <td class='text-left text-error' width='98%'> $dg[question]</td>        
                                    </tr>";
                                }
                            ?>
                        </table>
                        <div>
                            <input type="submit" class="btn btn-success" name="periksa" id="periksa" value="Periksa Konsultasi"> 
                        </div>
                            
                        <?php
                            if(isset($_POST['periksa'])){
                                $jumlah = count($_POST["item"]);
                                
                                if($jumlah<1){
                                    echo "<script>
                                            alert('Pilih satu atau beberapa gejala untuk melakukan konsultasi');
                                            window.location='?p=konsultasi'</script>";
                                }else if($jumlah>=3){
                                    if($jumlah>11){
                                        echo "<script>
                                            alert('Maksimal Inputkan 11 Gejala. Mohon Diulangi Kembali');
                                            window.location='?p=konsultasi'</script>";
                                    }else if($jumlah<=11){
                                        //================ GENERATE ID OTOMATIS =========================
                                        // $query_cid = mysqli_query($kon, "SELECT max(right(konsultasi, 8))+1 as rid_cid from hasil_konsultasi group by konsultasi");
                                        $query_cid = mysqli_query($kon, "SELECT max(right(konsultasi, 8))+1 as rid_cid from hasil_konsultasi");
                                        $sql_cid = mysqli_fetch_array($query_cid);
                                        $id_cid = $sql_cid['rid_cid'];
                                        $itung = strlen($id_cid);
                                        
                                        if ($itung==8){
                                            $id_up = $id_cid;
                                        } else if($itung==7){
                                            $id_up = "0".$id_cid;
                                        } else if($itung==6){
                                            $id_up = "00".$id_cid;
                                        } else if($itung==5){
                                            $id_up = "000".$id_cid;
                                        } else if($itung==4){
                                            $id_up = "0000".$id_cid;
                                        } else if($itung==3){
                                            $id_up = "00000".$id_cid;
                                        } else if($itung==2){
                                            $id_up = "000000".$id_cid;
                                        } else if($itung==1){
                                            $id_up = "0000000".$id_cid;
                                        } else {
                                            $id_up = "00000001";
                                        }

                                        $konsultasi = "K-".$id_up;
                                        //=============END GENERATE ID OTOMATIS =========================

                                        $id_user=$_SESSION['id_user'];
                                
                                        for($i=0; $i < $jumlah; $i++){
                                            $gejala = $_POST["item"][$i];
                                            
                                            $sb = mysqli_query($kon,"SELECT * from gejala where id_gejala=$gejala");
                                            $rb = mysqli_fetch_array($sb);
                                            $bobot = $rb['bobot'];
                                            
                                            $q=mysqli_query($kon,"insert into hasil_konsultasi(id_user, konsultasi, id_gejala, bobot, waktu) value ('$id_user', '$konsultasi', '$gejala', '$bobot', NOW())") or die(mysqli_error());
                                            
                                            if ($q){
                                                $nk = mysqli_query($kon,"SELECT * from hasil_konsultasi group by waktu desc limit 1");
                                                $r = mysqli_fetch_array($nk);
                                                echo "<script>
                                                        alert('Lihat Hasil');
                                                        window.location='?p=hasil&id=$id_user&konsultasi=$r[konsultasi]';
                                                        </script>";
                                            }
                                            else{
                                                echo "Konsultasi Gagal";
                                                echo "Silahkan <a href = '?p=konsultasi'>Ulangi Disini</a>";
                                            }
                                        }                            
                                    }
                                }
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>


<br><br><br><br>
<?php }else{
        echo "<script language='javascript'>
        alert('Sebelum melakukan Konsultasi, silahkan login terlebih dahulu');
        window.location=('?p=login')</script>";
} ?>

</body>
</html>