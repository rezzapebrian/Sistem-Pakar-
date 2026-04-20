<div class="content">
    <div class="row">
    	<div class="col-lg-12">
    		<div class="content">
    
    			<div class="row">
    
    				<div class="col-lg-6 offset-lg-3">
    
                        <div class="card">
    						<div class="card-header header-elements-inline">
    							<h5 class="card-title">Tambah Data Admin</h5>
    						</div>
    						<hr>
    						<div class="card-body">
    						    <form method="post" id='form-edit' action="<?php echo "?p=addadminaksi"; ?>" enctype="multipart/form-data">
                                    <fieldset class="mb-3">
                                    	<div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Nama</label>
                    			                    <input type="text" class="form-control" name="nama">
                    			                </div>
                    			            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Username</label>
                    			                    <input type="text" class="form-control" name="username">
                    			                </div>
                    			            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Password</label>
                    			                    <input type="password" class="form-control" name="password">
                    			                </div>
                    			            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12">
                    			                <div class="form-group">
                    			                    <label>Roles</label>
                    			                    <select class="form-control" name="roles">
                                                        <!-- <option value="" selected disabled>-- Silahkan Pilih Roles --</option> -->
                                                        <option value="admin" selected>ADMIN</option>
                                                        <option value="dokter">DOKTER/PERAWAT</option>
                                                    </select>
                    			                </div>
                    			            </div>
                                        </div>
                                        
                                    </fieldset>
                    
                    			    <hr>
                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                            					<a href="index.php?p=admin" class="btn btn-light"><i class="icon-arrow-left52 mr-2"></i> Kembali</a>
                            					<button type="submit" class="btn bg-blue" id="btn-edit" name="Submit" value="Submit">Simpan <i class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </div>
                    				</div>
                    
                                </form>
    						</div>
    					</div>
    				</div>
    
    					
    			</div>
    
    		</div>
    	</div>
    </div>
</div>