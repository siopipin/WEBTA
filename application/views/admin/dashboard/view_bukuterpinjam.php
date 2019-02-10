<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_dashboard/index/') ?>">Dashboard</a>
                    <li class="active">Buku Terpinjam</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

            <div class="col-md-12">
           
            <h3>Buku Terpinjam</h3>
                    <br>
                    <br>
                    <div class="row">
                        <?php
                            foreach ($buku as $row) {
                                $now = new DateTime();
                                $tglkembali = $row->t_tanggalkembali;
                                $date = new DateTime($tglkembali);
                                $sisawaktu = $date->diff($now)->format("%d hari, %h jam dan %i menit");

                        ?>

                        <div class="col-md-3">
                            <div class="card card-product">
                                <div class="card-image" data-header-animation="true">
                                    <a href="#pablo">
                                        <img class="img" src="<?php echo base_url('assets/img/buku/'.$row->b_sampul);?>">
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-actions">
                                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                            <i class="material-icons">build</i> Fix Header!
                                        </button>
                                        <a href="<?php echo base_url('controller_buku/baca/'.$row->b_idbuku) ?>">
                                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Lihat Buku">
                                            <i class="material-icons">art_track</i>
                                        </button>
                                        </a>
                                       
                                    </div>
                                    <h4 class="card-title">
                                        <a href="#pablo"><?php echo $row->b_judul;?></a>
                                    </h4>
                                    <div class="card-description text-capitalize">
                                    <?php echo $row->b_klasifikasi;?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('controller_buku/baca/'.$row->b_idbuku) ?>">
                                    <div class="btn btn-rose btn-block">
                                        Baca
                                    </div>
                                    </a>

                                    <div class="btn btn-primary btn-block">
                                        <small>
                                            <?php echo $sisawaktu;?>
                                        </small>
                                    </div>

                                    <a href="<?php echo base_url('controller_buku/perpanjang/'.$row->b_idbuku) ?>">
                                    <div class="btn btn-default btn-block">
                                        Perpanjang
                                    </div>
                                    </a>
                                </div>
                            </div>        
                        </div>
                        
                        <?php } ?>
                    
                    </div>
                    
            </div>
        </div>
    </div>
</div>