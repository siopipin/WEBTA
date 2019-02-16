<header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="<?php echo site_url('controller_auth/index') ?>"><img src="<?php echo base_url(); ?>assets/landing/images/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="<?php echo site_url('controller_dashboard/index') ?>">Beranda</a></li>
                            <li><a href="<?php echo base_url('controller_landing/tentang') ?>">Tentang</a></li>
                            <li><a href="<?php echo base_url('controller_landing/semuakategori') ?>">Klasifikasi</a></li>
                            <li><a href="<?php echo base_url('controller_landing/kontak') ?>">Kontak</a></li>
                            <li class="menu-btn">
                                <?php if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '0' || $this->session->userdata('akses') == '3') : ?>
                                    <a class="template-btn"><?php echo $this->session->userdata('ses_nama'); ?></a>
                                    <a href="<?php echo base_url('controller_dashboard/index') ?>" class="template-btn-beranda">Board</a>
                                    <a href="<?php echo base_url('controller_auth/logout') ?>" class="template-btn-danger">Keluar</a>
                                <?php else : ?>
                                <li>
                                    <a href="<?php echo site_url('controller_auth/login/') ?>" class="login">masuk</a>
                                    <a href="<?php echo site_url('controller_auth/registration/') ?>" class="template-btn">daftar</a>
                                </li>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>