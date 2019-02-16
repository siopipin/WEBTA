<!-- Banner Area Starts -->
<section class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-bg"></div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="banner-text">
                    <h1>Perpustakaan Digital <span>EPERPUS</span> dengan DRM dan MFCMHPRS</h1>
                    <p class="py-3">Temukan dan baca buku digital yang direkomendasi untuk Mu! dengan pengalaman membaca
                        diperangkat atau browser anda.</p>
                    <a href="#semuabuku" class="secondary-btn">Telusuri sekarang<span class="flaticon-next"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->
<!-- Semua Buku -->
<section id="blog" class="news-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-top">
                    <br>
                    <br>
                    <h2>Semua Klasifikasi Buku</h2>
                    <p>Temukan semua klasifikasi buku digital </p>
                </div>
            </div>
        </div>
        <div class="row">
            <a name="semuabuku"></a>
                <?php
                foreach ($results as $row) {
                ?>
                <div class="col-lg-3 col-md-6">
                    <a href="<?php echo site_url('controller_landing/bukuKlasifikasi/'.$row->b_klasifikasi) ?>">
                    <div class="single-category text-center mb-4">
                        <h4><?php echo $row->b_klasifikasi;?></strong></h4>
                    </div>
                    </a>
                </div>
                <?php }
                ?>
            <div class="col-lg-12">
                <p><?php echo $links; ?></p>
            </div>
        </div>
    </div>
</section>