<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                <form method="post" action="<?php echo base_url().'controller_auth/login' ?>">
                    <div class="card card-login card-hidden">
                        <div class="card-header text-center" data-background-color="rose">
                            <h4 class="card-title">Masuk</h4>
                            <div class="social-line">
                                <a href="#btn" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#eugen" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <p class="category text-center">
                                <?php  echo $this->session->flashdata('msg'); 
                            
                                 ?>
                            <br>
                            <div class="text-center">
                                Masuk dengan cara biasa
                            </div>
                        </p>
                        <div class="card-content">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label">Nama Pengguna</label>
                                    <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control">
                                    <span
                                    class="text-danger"><?php echo form_error('nama_pengguna'); ?></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <div class="form-group label-floating">
                                    <label class="control-label">Kata Sandi</label>
                                    <input type="password" id="kata_sandi" name="kata_sandi" class="form-control">
                                    <span
                                    class="text-danger"><?php echo form_error('kata_sandi'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>