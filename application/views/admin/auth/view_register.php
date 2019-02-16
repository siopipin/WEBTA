<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="card card-signup">
                <!-- flashdata - pesan pemberitahuan -->
                <div class="col-sm-12">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <h2 class="card-title text-center">Daftar Baru</h2>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="card-content">
                            <div class="info info-horizontal">
                                <div class="icon icon-rose">
                                    <i class="material-icons">book</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Baca Buku Digital</h4>
                                    <p class="description">
                                        Dengan EReader Epub yang dapat langsung kamu gunakan untuk membaca buku secara langsung dipengkat mu!.
                                    </p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-primary">
                                    <i class="material-icons">vpn_key</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">DRM system dengan AES</h4>
                                    <p class="description">
                                        Perpustakaan digital dengan Digital Rights Management sehingga buku dienkripsi terlebih dahulu.
                                    </p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">MFCM</h4>
                                    <p class="description">
                                        Dengan algoritma rekomendasi MFCM anda akan mendapatkan rekomendasi buku yang sesuai untuk anda!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="social text-center">
                            <button class="btn btn-just-icon btn-round btn-twitter">
                                <i class="fa fa-twitter"></i>
                            </button>
                            <button class="btn btn-just-icon btn-round btn-dribbble">
                                <i class="fa fa-dribbble"></i>
                            </button>
                            <button class="btn btn-just-icon btn-round btn-facebook">
                                <i class="fa fa-facebook"> </i>
                            </button>
                            <h4> denan cara biasa </h4>
                        </div>
                        <form class="form" action="<?php echo base_url(); ?>controller_auth/registration" method="post">
                            <div class="card-content">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">how_to_reg</i>
                                    </span>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                    <span class="text-danger"><?php echo form_error('nama'); ?></span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna">
                                    <span class="text-danger"><?php echo form_error('nama_pengguna'); ?></span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email...">
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input type="password" placeholder="Password..." class="form-control" id="kata_sandi" name="kata_sandi" />
                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">ballot</i>
                                    </span>
                                    <input type="password" placeholder="Ulangi Kata Sandi" class="form-control" id="konfirmasi_kata_sandi" name="konfirmasi_kata_sandi" />
                                    <span class="text-danger"><?php echo form_error('konfirmasi_kata_sandi'); ?></span>
                                </div>
                                <!-- If you want to add a checkbox to this form, uncomment this code -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked required> Saya Menyetujui
                                        <a href="#">Syarat dan Ketentuan yang berlaku</a>.
                                    </label>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button class="btn btn-primary btn-round" type="submit">Daftar</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>