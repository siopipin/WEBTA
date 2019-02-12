<!-- Banner Area Starts -->

<section class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <?php echo $this->session->flashdata('msg');?>
            </div>
        </div>
        <div class="row">
        
            <div class="col-lg-6">
                <div class="banner-bg"></div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="banner-text">
                    <h1>Kontak Perpustakaan Digital <span>EPERPUS</span> dengan DRM dan MFCMHPRS</h1>
                    <p class="py-3">Temukan dan baca buku digital yang direkomendasi untuk Mu! dengan pengalaman membaca
                        diperangkat atau browser anda.</p>
                    <a href="#semuabuku" class="secondary-btn">Telusuri sekarang<span class="flaticon-next"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Map Area Starts -->

<br>
<br>
<br>

<section class="contact-form section-padding3">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="info-text">
                        <h4>Medan - Indonesia</h4>
                        <p>Jl. Thamrin No.112 Kampus B Mikroskil</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="info-text">
                        <h4>082276438906</h4>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="into-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="info-text">
                        <h4>mail@eperpus.com</h4>
                        <p>Kirim kami masukkan!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="form" action="<?php echo base_url(); ?>controller_landing/pesan" method="post">
                    <div class="left">
                        <input name="vnama" type="text" placeholder="Masukkan Nama" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Masukkan Nama'" required>
                        <input name="vemail" type="email" placeholder="Masukan Email" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Masukan Email'" required>
                        <input name="vjudul" type="text" placeholder="Judul Pesan" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Judul Pesan'" required>
                    </div>
                    <div class="right">
                        <textarea name="vpesan" cols="20" rows="7" placeholder="Masukkan Pesan Anda"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Pesan Anda'"
                            required></textarea>
                    </div>
                    <button type="submit" class="template-btn">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form End -->