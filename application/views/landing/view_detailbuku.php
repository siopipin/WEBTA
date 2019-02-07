<!-- Banner Buku -->
<section class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="sampul">
                    <img src="<?php echo base_url('assets/img/buku/'.$edit['b_sampul']);?>"
                        style="width: 100%;height: 640px;background-repeat: no-repeat;background-position: center;background-size: cover"
                        alt="buku">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="banner-text">
                    <p class="py-3">
                        <?php
                                $nilai = $edit['b_rating'];
                                
                                echo "<span> <small>Rating :</small> ";
                                for ($i=0; $i < 5; $i++){
                                    if($i<$nilai)
                                    echo "<i class='fa fa-star' aria-hidden='true'></i>
                                    ";
                                    else echo "<i class='fa fa-star-o' aria-hidden='true'></i>";
                             } echo "</span>"; ?>
                    </p>
                    <h1><?php echo $edit['b_judul']; ?></h1>
                    <p class="py-3">
                        <?php 
                            $kalimat = $edit['b_deskripsi'];
                            $jumlahkarakter=115;
                            $cetak = substr($kalimat, 0, $jumlahkarakter);
                            echo $cetak; 
                        ?>
                    </p>
                    <a href="#detail" class="secondary-btn">Lebih Detail<span class="flaticon-next"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="job-single-content section-padding">
    <div class="container">
        <div class="row">
            <a name="detail"></a>
            <div class="col-lg-8">
                <?php echo $this->session->flashdata('msg');
                ?>
                <div class="main-content">
                    <div class="single-content1">
                        <div class="single-job mb-4 d-lg-flex justify-content-between">
                            <div class="job-text">
                                <h4><?php echo $edit['b_judul']; ?></h4>
                                <ul class="mt-4">
                                    <li class="mb-3">
                                        <h5><i class="fa fa-map-marker"></i>ISBN: <?php echo $edit['b_isbn']; ?></h5>
                                    </li>
                                    <li class="mb-3">
                                        <h5><i class="fa fa-pie-chart"></i>Pengarang:
                                            <?php echo $edit['b_pengarang']; ?></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-clock-o"></i>Penerbit: <?php echo $edit['b_penerbit']; ?>
                                        </h5>
                                    </li>
                                </ul>
                            </div>
                            <div class="job-btn align-self-center">
                                <a class="forth-btn">Sisa Pinjam (<?php echo $edit['b_jumlah']; ?>)</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-content2 py-4">
                        <h4>Deskripsi Buku <span style="color:red"><?php echo $edit['b_judul']; ?></span></h4>
                        <p><?php echo $edit['b_deskripsi']; ?></p>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="single-item mb-4">
                        <h4 class="mb-4">Detail Lanjutan</h4>
                        <a class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Tahun Terbit</span>
                            <span class="text-right"><?php echo $edit['b_tahunterbit']; ?></span>
                        </a>
                        <a class="sidebar-btn d-flex justify-content-between mb-3">
                            <span>Teks Bahasa</span>
                            <span class="text-right"><?php echo $edit['b_bahasa']; ?></span>
                        </a>
                        <?php  
                            $idBuku = $edit['b_idbuku'];
                            $mysqli = new mysqli("localhost", "root", "", "db_perpus");       
                            $query2 = $mysqli->query("SELECT * FROM `tbl_transaksi` WHERE t_idpengguna = ".$_SESSION['ses_id']." AND t_idbuku = ".$idBuku." AND t_status = 'Y'");
                            $result = mysqli_num_rows($query2);
                            if($result==0){                        
                        ?>
                        <a href="<?php echo base_url('controller_buku/simpanTransaksi/'.$edit['b_idbuku']) ?>"
                            class="btn btn-primary btn-lg btn-block">
                            Pinjam
                        </a>
                            <?php } else {
                                ?>
                        <a href="<?php echo base_url('controller_buku/baca/'.$idBuku) ?>">
                            <div class="btn btn-rose btn-block">
                                Baca
                            </div>
                        </a>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>