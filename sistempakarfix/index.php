<?php
	session_start();
	include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Pakar</title>
   
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="assets/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="assets/global_assets/js/main/jquery.min.js"></script>
    <script src="assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="assets/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="assets/global_assets/js/plugins/buttons/hover_dropdown.min.js"></script>
    <!-- <script src="<?php //echo base_url();?>assets_be/js/app.js"></script> -->
    <!-- /theme JS files -->
    <!--<script type="text/javascript" src="<?php //echo base_url();?>ckeditor/ckeditor.js"></script>-->
   
</head>

<body>
    
    <img src="image/banner.jpg" width="100%" style="height: 250px;" />

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">

    	<!--<div class="navbar-brand d-md-none">-->
    	<div class="navbar-brand">
    		<!--<a class="d-inline-block" style="width: 50px; height: 1rem;">-->
    		<a class="d-inline-block">
    			<img src="image/logo-rsud-Kota-Depok-1.png" style="height: 40px;">
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
    				<a href="<?php echo"?p=home";?>" class="navbar-nav-link">
    					<span>Home</span>
    				</a>
    			</li>
    			<li class="nav-item">
    				<a href="<?php echo"?p=konsultasi";?>" class="navbar-nav-link">
    					<span>Konsultasi</span>
    				</a>
    			</li>
    			<li class="nav-item">
    				<a href="<?php echo"?p=hasilkonsul";?>" class="navbar-nav-link">
    					<span>Riwayat Konsultasi</span>
    				</a>
    			</li>
    			<li class="nav-item">
    				<a href="<?php echo"?p=petunjuk";?>" class="navbar-nav-link">
    					<span>Petunjuk</span>
    				</a>
    			</li>
    			
    			<?php if(!empty($_SESSION['namapas']) && !empty($_SESSION['passpas'])){ ?>
        			<li class="nav-item">
        				<a href="logout.php" class="navbar-nav-link">
        					<span>Logout</span>
        				</a>
        			</li>
                <?php } else { ?>
                    <li class="nav-item">
        				<a href="<?php echo"?p=login";?>" class="navbar-nav-link">
        					<span>Login</span>
        				</a>
        			</li>
                <?php } ?>
                
    			<li class="nav-item">
    				<a href="<?php echo"?p=registrasi";?>" class="navbar-nav-link">
    					<span>Registrasi</span>
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
            <div class="content">
                <div class="row">
                	<div class="col-lg-12">
                		<div class="content">
                
                			<div class="row">
                
                				<div class="col-lg-9">
                                    
                                    <?php error_reporting(E_ERROR | E_WARNING | E_PARSE);?>
                                	<?php
                                        if (isset($_GET["p"])){
                                            if($_GET["p"] == "home"){
                                                include "home.php";
                                            } else if ($_GET["p"] == "konsultasi"){
                                                include "konsultasi.php";
                                            }else if ($_GET["p"] == "hasilkonsul"){
                                                include "hasilkonsul.php";
                                            }else if ($_GET["p"] == "lupapass"){
                                                include "lupapass.php";
                                            }else if ($_GET["p"] == "petunjuk"){
                                                include "petunjuk.php";
                                            }else if ($_GET["p"] == "login"){
                                                include "login.php";
                                            }else if ($_GET["p"] == "registrasi"){
                                                include "registrasi.php";
                                            }else if ($_GET["p"] == "hasil"){
                                                include "hasil.php";
                                            }else if ($_GET["p"] == "regscs"){
                                                include "regscs.php";
                                            }else if ($_GET["p"] == "loginadmin"){
                                                include "login_admin.php";
                                            }else if ($_GET["p"] == "logindokter"){
                                                include "login_dokter.php";
                                            }else if ($_GET["p"] == "registrasi_dokter"){
                                                include "registrasi_dokter.php";
                                            }else if ($_GET["p"] == "lupapass_dokter"){
                                                include "lupapass_dokter.php";
                                            }else if ($_GET["p"] == "hapushasilkonsultasi"){
        			                            include "hapushasilkonsultasi.php";
                                            }else{
                                                include "home.php";
                                            }
                                        } else {
                                            include "home.php";
                                        }
                                		
                                	?>
                                    
                				</div>
                				
                				<div class="col-lg-3">
                				    <div class="card">
                						<div class="card-body">
                					
                				            <?php include "sidebar.php"; ?>
                    				    </div>
                                    </div>
                                </div>
                
                					
                			</div>
                
                		</div>
                	</div>
                </div>
            </div>
            

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>


