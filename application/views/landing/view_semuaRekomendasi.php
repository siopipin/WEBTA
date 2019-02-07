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
                    <h2>Semua Buku Rekomendasi Untukmu!</h2>
                    <p>Temukan semua buku digital </p>
                </div>
            </div>
        </div>
        <div class="row">
                <?php 
                $lim=0;
                    foreach($mfcm as $row) {
                        
                ?>
                <div class="col-md-3 col-sm-3">
                    <div class="single-package-item">
                        <img src="<?php echo base_url('assets/img/buku/'.$row['b_sampul']);?>" alt="package-place">
                        <div class="single-package-item-txt">
                            <h5><small><b><?php echo $row['b_judul'];?></b></small></h5>
                            <div class="packages-para">
                                <p>
                                    <span>
                                        <i class="fa fa-address-card-o"></i> <?php echo $row['b_pengarang'];?>
                                    </span>
                                    
                                </p>
                                <p>
                                    <span>
                                        <i class="fa fa-bars"></i> <?php echo $row['b_klasifikasi'];?>
                                    </span>
                                    
                                </p>
                            </div>
                            <!--/.packages-para-->
                            <div class="packages-review">
                                <p>
                                    <?php
                                        $rate = $row['b_rating'];
                                        $nilai = substr($rate,0,3);
                                        
                                        echo "Rating : ";
                                        for ($i=0; $i < 5; $i++){
                                            if($i<$nilai)
                                            echo "<i class='fa fa-star' aria-hidden='true'></i>
                                            ";
                                            else echo "<i class='fa fa-star-o' aria-hidden='true'></i>";
                                    } ?>
                                    
                                    
                                </p>
                            </div>
                            <!--/.packages-review-->
                            <a href="<?php echo site_url('controller_landing/detailBuku/'.$row['b_idbuku']) ?>" style="color:black;">

                            <div class="col-md-12">
                                <div class="about-btn">
                                    <button class="about-view packages-btn">
                                        Detail Buku
                                    </button>
                                </div>
                            </div>
                            </a>
                            <!--/.about-btn-->
                        </div>
                        <!--/.single-package-item-txt-->
                    </div>
                    <!--/.single-package-item-->
                </div>
                <?php } ?>
                <!--/.col-->    
            </div>
            <p><?php echo $links; ?></p>
    </div>
</section>