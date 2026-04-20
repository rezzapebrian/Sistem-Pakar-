<?php
 	session_start();
	include "../admin/koneksi.php";
	
	$sqladm = "select * from dokter where username='$_POST[username]' and password='$_POST[password]'";
	$paru = mysqli_query($kon, $sqladm) or die (mysqli_error($kon));
	$row = mysqli_num_rows($paru);
	$radm = mysqli_fetch_array($paru);
	if($row > 0){		
		$_SESSION["namaadm"]=$radm["username"];
		$_SESSION["passadm"]=$radm["password"];
		$_SESSION["roles"] = "dokter";
		
		header ("location:index.php");
	}else{
		// $_SESSION["pesan_dokter"] = "Username atau Password Salah!";
		// header ("location:../index.php?p=logindokter");
		echo "
		<script>
	        alert('Username atau Password Salah!');
	        window.location.href='../index.php?p=logindokter';
	    </script>";
	}
?> 