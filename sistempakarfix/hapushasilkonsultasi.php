<?php
	session_start();
	include "koneksi.php";
	$sqlpasien = "select * from pasien where id_user='$_SESSION[id_user]'";
	$hapus = mysqli_query ($kon, $sqlpasien);
	
	if(mysqli_fetch_array($hapus)){
		$sql_check = "select * from keterangan where id_keterangan = '$_GET[hapus]'";
		$q_check = mysqli_query($kon, $sql_check) or die (mysqli_error($kon));
		$r_check = mysqli_fetch_array($q_check);
		
		if ($r_check['id_pasien'] != $_SESSION[id_user]){
		    echo"<script>
		        alert('Anda tidak bisa menghapus data pasien lain!!');
        		window.location.href='index.php?p=hasilkonsul';
        	</script>";
		} else {
		    $sqldelete="delete from keterangan where id_keterangan = '$_GET[hapus]'";
    		$hapus = mysqli_query($kon, $sqldelete) or die (mysqli_error($kon));
    		if($hapus){
    			echo"<script>
            		window.location.href='index.php?p=hasilkonsul';
            	</script>";
    		}else{
    			echo"<script>
            		window.location.href='index.php?p=hasilkonsul';
            	</script>";
    			}
    		}
		}
	
		
	?>
