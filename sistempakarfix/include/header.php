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
            <?php }else{ ?>
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


		<!--<ul class="navbar-nav ml-auto">-->

		<!--	<li class="nav-item dropdown dropdown-user">-->
		<!--		<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">-->
		<!--			<img src="<?php echo base_url();?>assets_be/global_assets/images/image.png" class="rounded-circle mr-2" height="34" alt="">-->
		<!--			<span><?php echo $data_adminnya->fullname;?></span>-->
		<!--		</a>-->
		<!--		<div class="dropdown-menu dropdown-menu-right">-->
		<!--			<a href="<?php echo base_url().'MyAccount';?>" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>-->
		<!--			<a href="<?php echo base_url().'logout';?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>-->
		<!--		</div>-->
		<!--	</li>-->

		<!--</ul>-->

	</div>
</div>