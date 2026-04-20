<?php
	session_start();
	include "../admin/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Pakar | ADMIN</title>
   
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../assets/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="../assets/global_assets/js/main/jquery.min.js"></script>
    <script src="../assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="../assets/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="../assets/global_assets/js/plugins/buttons/hover_dropdown.min.js"></script>
    <!-- <script src="<?php //echo base_url();?>assets_be/js/app.js"></script> -->
    <!-- /theme JS files -->
    <!--<script type="text/javascript" src="<?php //echo base_url();?>ckeditor/ckeditor.js"></script>-->
   
</head>

<body>
    
    <img src="../image/banner.jpg" width="100%" style="height: 250px;" />

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">

    	<div class="navbar-brand d-md-none">
    		<a class="d-inline-block" style="width: 20px; height: 1rem;">
    			
    		</a>
    	</div>
    
    	<div class="d-md-none">
    		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
    			<!-- <i class="icon-tree5"></i> -->
    			<i class="icon-paragraph-justify3"></i>
    		</button>
    	</div>
    
    
    	<div class="collapse navbar-collapse" id="navbar-mobile">
    
    		<ul class="navbar-nav">
    			<li class="nav-item">
    				<a href="<?php echo"?p=penyakit";?>" class="navbar-nav-link">
    					<span>Penyakit</span>
    				</a>
    			</li>
    			<li class="nav-item">
    				<a href="<?php echo"?p=gejala";?>" class="navbar-nav-link">
    					<span>Gejala</span>
    				</a>
    			</li>
    			<li class="nav-item">
    				<a href="<?php echo"?p=basiskasus";?>" class="navbar-nav-link">
    					<span>Basis Kasus</span>
    				</a>
    			</li>
    			<li class="nav-item">
    				<a href="<?php echo"?p=hasilkonsultasi";?>" class="navbar-nav-link">
    					<span>Hasil Konsultasi</span>
    				</a>
    			</li>
    			
				<li class="nav-item">
    				<a href="logout.php" class="navbar-nav-link">
    					<span>Logout</span>
    				</a>
    			</li>
                
    		</ul>
    
    	</div>
    </div>
    <!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            
                

            <?php error_reporting(E_ERROR | E_WARNING | E_PARSE);?>
            <?php
                if (isset($_GET["p"])){
            		if ($_GET["p"] == "admin"){
            			include "../admin/admin.php";
            		}else if ($_GET["p"] == "addadmin"){
            			include "../admin/addadmin.php";
            		}else if ($_GET["p"] == "addadminaksi"){
            			include "../admin/addadminaksi.php";
            		}else if ($_GET["p"] == "editadmin"){
            			include "../admin/editadmin.php";
            		}else if ($_GET["p"] == "editadminaksi"){
            			include "../admin/editadminaksi.php";
            		}else if ($_GET["p"] == "hapusadmin"){
            			include "../admin/hapusadmin.php";
            		}else if ($_GET["p"] == "penyakit"){
            			include "../admin/penyakit.php";
            		}else if ($_GET["p"] == "addpenyakit"){
            			include "../admin/addpenyakit.php";
            		}else if ($_GET["p"] == "addpenyakitaksi"){
            			include "../admin/addpenyakitaksi.php";
            		}else if ($_GET["p"] == "editpenyakit"){
            			include "../admin/editpenyakit.php";
            		}else if ($_GET["p"] == "editpenyakitaksi"){
            			include "../admin/editpenyakitaksi.php";
            		}else if ($_GET["p"] == "hapuspenyakit"){
            			include "../admin/hapuspenyakit.php";
            		}else if ($_GET["p"] == "logout"){
            			include "../admin/logout.php";
            		}else if ($_GET["p"] == "gejala"){
            			include "../admin/gejala.php";
            		}else if ($_GET["p"] == "addgejala"){
            			include "../admin/addgejala.php";
            		}else if ($_GET["p"] == "hapusgejala"){
            			include "../admin/hapusgejala.php";
            		}else if ($_GET["p"] == "editgejala"){
            			include "../admin/editgejala.php";
            		}else if ($_GET["p"] == "basiskasus"){
            			include "../admin/basiskasus.php";
            		}else if ($_GET["p"] == "addbasiskasus"){
            			include "../admin/addbasiskasus.php";
            		}else if ($_GET["p"] == "hapusbasiskasus"){
            			include "../admin/hapusbasiskasus.php";
            		}else if ($_GET["p"] == "editbasiskasus"){
            			include "../admin/editbasiskasus.php";
            		}else if ($_GET["p"] == "hasilkonsultasi"){
            			include "../admin/hasilkonsultasi.php";
            		}else if ($_GET["p"] == "hapushasilkonsultasi"){
            			include "../admin/hapushasilkonsultasi.php";
            		}
                }
        	?>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>


</html>


