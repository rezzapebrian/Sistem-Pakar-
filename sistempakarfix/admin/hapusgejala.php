<?php
    session_start();
    include "koneksi.php";

    $sqladm = "select * from admin where username='$_SESSION[namaadm]'";
    $user = mysqli_query ($kon, $sqladm);
    
    if(mysqli_num_rows($user)){
        $sqldelete="delete from gejala where id_gejala = '$_GET[hapus]'";
        $hapus = mysqli_query($kon, $sqldelete) or die (mysqli_error($kon));
        if($hapus){
            echo"<script>
        
                window.location.href='index.php?p=gejala';
            </script>";
        }else{
            echo"<script>
                window.location.href='index.php?p=gejala';
            </script>";
        }
    } else {
    	echo"<script>
            window.location.href='../index.php?p=loginadmin';
        </script>";
    }
?>