<!-- Banner Area Starts -->
<section class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xl-6">
                <div class="banner-bg"></div>
            </div>
            <div class="col-lg-6 col-md-3 col-xl-6 align-self-center">
                <div class="banner-text">
                    <h1>Perpustakaan Digital <span>EPERPUS</span> dengan DRM dan MFCMHPRS</h1>
                    <p class="py-3">Temukan dan baca buku digital yang direkomendasi untuk Mu! dengan pengalaman membaca
                        diperangkat atau browser anda.</p>
                    <a href="#kategori" class="secondary-btn">Telusuri sekarang<span class="flaticon-next"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->

<!-- Search Area Starts -->
<div class="search-area">
    <div class="search-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form action="#" class="d-md-flex justify-content-between">
                        <a class="template-btn">Cari</a>
                        <select id="search_option">
                            <option value="">Klasifikasi</option>
                            <?php foreach ($optklasifikasi as $row): ?>
                            <option value="<?php echo $row->b_klasifikasi ?>"><?php echo $row->b_klasifikasi ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="align-self-center" style="color:white">or</span>
                        <select id="search_option2">
                            <option value="">Penulis Buku</option>

                            <?php foreach ($optpenulis as $row): ?>
                            <option value="<?php echo $row->b_pengarang ?>"><?php echo $row->b_pengarang ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="align-self-center" style="color:white">or</span>
                        <input type="text" placeholder="Ketik kata pencarian disini" id="search_text"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ketik kata pencarian disini'"
                            required>
                    </form>
                </div>
            </div>

            <!-- Hasil Pencarian Buku -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xl-12">
                    <div id="result"></div>
                </div>
            </div>

            <div class="more-job-btn mt-5 text-center">
                <a href="<?php echo base_url('controller_landing/semuabuku') ?>" class="template-btn">Lihat Semua Buku</a>
            </div>
        </div>
    </div>
</div>
<!-- Search Area End -->

<!-- Feature Area Starts -->
<section class="feature-area section-padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-1">
                <div class="single-feature mb-4 mb-lg-0">
                    <h4>DRM System</h4>
                    <p class="py-3">Dengan DRM (Digital Right Manager) buku digital dapat mengatasi pelanggaran terhadap
                        hak cipta buku</p>
                    <a href="<?php echo base_url('controller_landing/tentang') ?>" class="secondary-btn">Cari tahu
                        tentang DRM<span class="flaticon-next"></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-1">
                <div class="single-feature mb-4 mb-lg-0">
                    <h4>MFCMHPRS</h4>
                    <p class="py-3">Merupakan Algoritma untuk rekomendasi buku. Dengan fitur ini anda akan mendapat
                        rekomendasi buku sesuai!</p>
                    <a href="<?php echo base_url('controller_landing/tentang') ?>" class="secondary-btn">Cari tahu
                        tentang MFCMHPRS<span class="flaticon-next"></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-1">
                <div class="single-feature">
                    <h4>AES</h4>
                    <p class="py-3">Dengan AES - 128 buku digital akan dienkripsi dan didekripsi terlebih dahulu sebelum
                        dibaca.</p>
                    <a href="<?php echo base_url('controller_landing/tentang') ?>" class="secondary-btn">Cari tahu
                        tentang AES<span class="flaticon-next"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature Area End -->


<!-- Bagian Rekomendasi -->

<!--packages start-->
<section id="pack" class="packages">
    <div class="container">
        <div class="gallary-header text-center">
            <h2>
                Buku Rekomendasi
            </h2>
            <p>
                Rekomendasi buku dengan algoritma MFCM
            </p>
        </div>
        <!--/.gallery-header-->
        <div class="packages-content">
            <div class="row">
                <?php 
                $lim=0;
                    foreach($mfcm as $row) {
                        $lim++;
                        if($lim<=8){
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
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
                                        Rincian Buku
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
                <?php }} ?>
                <!--/.col-->    
            </div>
            <!-- <div class="more-job-btn mt-5 text-center">
            <a href="<?php echo base_url('controller_landing/semuaRekomendasi') ?>" class="template-btn">Lihat Semua Rekomendasi</a>
            </div> -->

            <!--/.row-->
        </div>
        <!--/.packages-content-->
    </div>
    <!--/.container-->

</section>
<!--/.packages-->
<!--packages end-->


<!-- Category Area Starts -->
<section class="category-area section-padding">
    <a name="kategori"></a>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-12">
                <div class="section-top text-center">
                    <h2>Klasifikasi Buku</h2>
                    <p>Temukan Klasifikasi Buku Pilihan mu!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xl-3">
                <div class="single-category text-center mb-4">
                    <img src="<?php echo base_url(); ?>assets/landing/images/cat1.png" alt="category">
                    <h4><?php echo $rekayasa['b_klasifikasi']; ?></h4>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xl-3">
                <div class="single-category text-center mb-4">
                    <img src="<?php echo base_url(); ?>assets/landing/images/cat2.png" alt="category">
                    <h4><?php echo $ilmukomputer['b_klasifikasi']; ?></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xl-3">
                <div class="single-category text-center mb-4">
                    <img src="<?php echo base_url(); ?>assets/landing/images/cat3.png" alt="category">
                    <h4><?php echo $internet['b_klasifikasi']; ?></h4>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xl-3">
                <div class="single-category text-center mb-4">
                    <img src="<?php echo base_url(); ?>assets/landing/images/cat4.png" alt="category">
                    <h4><?php echo $office['b_klasifikasi']; ?></h4>

                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-xl-12">
                <div class="more-job-btn mt-5 text-center">
                    <a href="<?php echo base_url('controller_landing/semuakategori') ?>" class="template-btn">Lihat
                        Semua Klasifikasi</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category Area End -->

<!-- News Area Starts -->
<section id="blog" class="news-area section-padding3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-12">
                <div class="section-top text-center">
                    <h2>Buku yang Baru ditambah</h2>
                    <p>Temukan buku digital yang baru ditambahkan </p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $cekcount = 0;
             foreach($terbaru->result() as $row) {
                 $cekcount++;
                 if($cekcount > 2){
                     break;
                 }
                ?>
            <div class="kartu-columns">
                <?php
                $cekcount = 0;
                foreach($terbaru->result() as $row) {
                $kalimat = "$row->b_deskripsi";
                $jumlahkarakter=90;
                $cetak = substr($kalimat, 0, $jumlahkarakter);
                $cekcount++;
                
                if($cekcount > 10){
                break;
                }
                ?>
                <a href="<?php echo site_url('controller_landing/detailBuku/'.$row->b_idbuku) ?>" style="color:black;">
                    <div class="card">
                        <img src="<?php echo base_url('assets/img/buku/'.$row->b_sampul);?>" class="card-img-top"
                            alt="cover">
                        <div class="card-body">
                            <p class="card-title"><strong><?php echo $row->b_judul;?></strong></p>
                            <p class="card-text"><small><?php echo $cetak;?>...</small></p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <?php
                                $nilai = "$row->b_rating";
                                
                                echo "<span> <small>Rating :</small> ";
                                for ($i=0; $i < 5; $i++){
                                    if($i<$nilai)
                                    echo "<i class='fa fa-star' aria-hidden='true'></i>
                                    ";
                                    else echo "<i class='fa fa-star-o' aria-hidden='true'></i>";
                             } echo "</span>"; ?>

                        </ul>
                        <div class="card-footer">
                            <a href="<?php echo site_url('controller_landing/detailBuku/'.$row->b_idbuku) ?>"
                                class="btn btn-primary btn-lg btn-block btn-sm">Rincian Buku
                            </a>
                        </div>
                    </div>
                </a>
                <br>
                <br>
                <?php } ?>
            </div>

            <?php } ?>


        </div>
        <div class="more-job-btn mt-5 text-center">
            <a href="<?php echo base_url('controller_landing/semuabuku') ?>" class="template-btn">Lebih banyak buku</a>
        </div>
    </div>
    </div>
</section>
<!-- News Area End -->

<!-- Download Area Starts -->
<section class="download-area section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xl-6">
                <div class="download-text">
                    <h2>Unduh aplikasi E-PERPUS di Smartphone kamu, Sekarang!</h2>
                    <p class="py-3">Membaca buku sekarang lebih mudah dimanapun dan kapanpun dengan smartphone kamu</p>
                    <div class="download-button d-sm-flex flex-row justify-content-start">
                        <div class="download-btn mb-3 mb-sm-0 flex-row d-flex">
                            <i class="fa fa-apple" aria-hidden="true"></i>
                            <a href="#">
                                <p>
                                    <span>Unduh </span> <br>
                                    untuk Iphone
                                </p>
                            </a>
                        </div>
                        <div class="download-btn dark flex-row d-flex">
                            <i class="fa fa-android" aria-hidden="true"></i>
                            <a href="http://localhost:8080/TAPerpus/uploads/Eperpus.apk"> 
                                <p>
                                    <span>Unduh </span> <br>
                                    untuk Android
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xl-6 pr-0">
                <div class="download-img"></div>
            </div>
        </div>
    </div>
</section>
<!-- Download Area End -->