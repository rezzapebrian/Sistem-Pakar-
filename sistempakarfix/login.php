<div class="content d-flex justify-content-center align-items-center">

    <!-- Login form -->
    <form name="" class="login-form" method="POST" action="loginaksi.php" enctype="multipart/form-data">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <h5 class="mb-0">LOGIN PASIEN</h5>
                    <span class="d-block text-muted">Masukan Akun Anda</span>
                </div>

                <?php /*/ ?>
                <?php if($_SESSION["pesan"]){?>
                <div class="alert alert-danger" id="pesan-login">
                    <?php echo $_SESSION["pesan"];?>
                </div>
                <script type="text/javascript">
                    setTimeout(function() {
                        $('#pesan-login').prop('hidden', true);
                    }, 2000);
                    window.setTimeout(function() {
                        $("#pesan-login").fadeTo(200, 0).fadeOut(100, function(){
                            $("#pesan-login").remove();
                        });
                    }, 2500);
                </script>
                <?php } ?>
                <?php /*/ ?>
                
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="Submit" class="btn btn-primary btn-block">LOGIN <i class="icon-circle-right2 ml-2"></i></button>
                </div>

                <div class="text-center">
                    <a href="index.php?p=registrasi">Belum Terdaftar? Silahkan Registrasi Terlebih Dahulu</a>
                    <hr>
                    <a href="index.php?p=lupapass">Klik Disini Jika Lupa Password Login</a>
                    <hr>
                    <a href="index.php?p=loginadmin">Login Sebagai Admin</a>
                    <hr>
                    <a href="index.php?p=logindokter">Login Sebagai Dokter</a>
                </div>
            </div>
        </div>
    </form>
    <!-- /login form -->

</div>

