<?php
 	session_start();
	include "koneksi.php";
	
	$sqladm = "select * from admin where username='$_POST[username]' and password='$_POST[password]'";
	$paru = mysqli_query($kon, $sqladm) or die (mysqli_error($kon));
	$row = mysqli_num_rows($paru);
	$radm = mysqli_fetch_array($paru);
	if($row > 0){		
		$_SESSION["namaadm"]=$radm["username"];
		$_SESSION["passadm"]=$radm["password"];
		$_SESSION["roles"] = "admin";
		
		header ("location:index.php");
	}else{
		// $_SESSION["pesan_admin"] = "Username atau Password Salah!";
		// header ("location:../index.php?p=loginadmin");
		echo "
		<script>
	        alert('Username atau Password Salah!');
	        window.location.href='../index.php?p=loginadmin';
	    </script>";
	}
?> 