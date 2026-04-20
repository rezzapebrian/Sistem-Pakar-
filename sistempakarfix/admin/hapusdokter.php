<?php
	session_start();
	include "koneksi.php";
	// $sqladm = "select * from dokter where username='$_SESSION[namaadm]'";
	// $hapus = mysqli_query ($kon, $sqladm);
	
	// if(mysqli_fetch_array($hapus)){
    if(isset($_SESSION[namaadm])){
		$sqldelete="delete from dokter where id_dokter = '$_GET[hapus]'";
		$hapus = mysqli_query($kon, $sqldelete) or die (mysqli_error($kon));
		if($hapus){
			echo"<script>
                window.location.href='index.php?p=dokter';
            </script>";
		}else{
			echo"<script>
                window.location.href='index.php?p=dokter';
            </script>";
        }
    }
?>
