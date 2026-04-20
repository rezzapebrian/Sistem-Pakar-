<?php
	session_start();
	include "koneksi.php";
	
    // $sqladm = "select * from admin where username='$_SESSION[namaadm]'";
	// $paru = mysqli_query ($kon, $sqladm);
	// $radm = mysqli_fetch_array($paru);
	
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$roles = $_POST['roles'];

    $check_username = mysqli_query ($kon, "SELECT * FROM admin WHERE username='$username'");
    if (mysqli_num_rows($check_username) > 0){
        echo"<script>
                alert('Mohon maaf Username sudah digunakan, silahkan gunakan username lain');
                window.location.href='index.php?p=addadmin';
            </script>";
    } else {
        $sql ="insert into admin (nama, username, password, roles) value ('$nama','$username','$password','$roles')";
	
        $admin = mysqli_query ($kon, $sql) or die(mysqli_error($kon));
        if($admin){
            // echo "Disimpan";
            echo"<script>
                window.location.href='index.php?p=admin';
            </script>";
        }else{
            // echo "Gagal menyimpan";
            echo"<script>
                window.location.href='index.php?p=admin';
            </script>";
        }
    }
?>