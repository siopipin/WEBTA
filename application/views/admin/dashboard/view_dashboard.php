<!-- KONTEN ADMIN -->
<?php if ($this->session->userdata('akses') == '1') : ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">book</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Buku Digital</p>
                        <h3 class="card-title"><?php echo $jumlahbuku['jumlah'] ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">local_offer</i>
                            <a href="<?php echo base_url('controller_page/databuku') ?>">Lihat Semua Buku</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Member</p>
                        <h3 class="card-title"><?php echo $jumlahmember['jumlah'] ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">local_offer</i>
                            <a href="<?php echo base_url('controller_kelolapengguna/daftarPengguna') ?>">Lihat Semua
                                Member</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">sync</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Peminjaman</p>
                        <h3 class="card-title"><?php echo $jumlahtransaksi['jumlah'] ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">local_offer</i>
                            <a href="<?php echo base_url('controller_laporan/laporanPinjam') ?>">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">event_note</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Peminjam Aktif</p>
                        <h3 class="card-title"><?php echo $jumlahtransaksiaktif['jumlah'] ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Sedang dipinjam
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">book</i> <span class="card-title"><b>Buku Terpopuler dipinjam</b></span>
                    </div>
                    <div class="card-content">

                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>

                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Terpinjam</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Terpinjam</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                $no = 1;
                $hitungbaris = 0;
                foreach($transaksi as $row) {
                    $tgl = date('d-m-Y', strtotime($row->b_tanggalsimpan));
                    $hitungbaris++;
                    if($hitungbaris > 5)
                    {
                        break;
                    }
                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <!-- jika ada buku di dalam database maka tampilkan -->
                                    <td><?php echo $row->b_judul;?></td>
                                    <td><?php echo $row->b_pengarang;?></td>
                                    <td><?php echo $row->jumlah;?></td>
                                    <td>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>



                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">local_offer</i>
                            <a href="<?php echo base_url('controller_page/databuku') ?>">Lihat Semua Buku</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">book</i> <span class="card-title"><b>Buku Terpopuler</b></span>
                    </div>

                </div>
                <div class="card-content">
                    <div id="graph"></div>
                </div>
                <script src="<?php echo base_url().'assets/js/jquery-3.1.1.min.js'?>"></script>
                <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
                <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
                <script>
                Morris.Bar({
                    element: 'graph',
                    data: <?php echo $chart;?>,
                    xkey: 'b_judul',
                    ykeys: ['jumlah'],
                    labels: ['Jumlah Pinjam']
                });
                </script>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">book</i> <span class="card-title"><b>Pengujian Rekomendasi Pada User HERU | ID: 15</b></span>
                    </div>
                    <div class="card-content">
                        <div class="material-datatables"><br /><br />

                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Rating</th>
                                        <th>Prediksi</th>
                                        <th>Jarak</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
                                        foreach($dataTest['produk'] as $row) {
                                        ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td>
                                            <form
                                                action="<?php echo site_url('controller_dashboard/updaterating/'.$row['idrating']) ?>"
                                                method="POST">
                                                <input type="text" class="form-control text-center"
                                                    name="vrating" value="<?php echo $row['rating'];?>" >
                                            </form>
                                            
                                        </td>
                                        <td><?php echo substr($row['prediksi'], 0,4);?></td>
                                        <td><?php echo substr($row['jarak'],0,4);?></td>

                                    </tr>
                                    <?php $no++; } ?>
                                    <tr>
                                        <td><?php echo "";?></td>
                                        <td><b><?php echo "Total";?></b></td>
                                        <td><?php echo "";?></td>
                                        <td><?php echo "";?></td>
                                        <td><b><?php echo substr($dataTest['total'],0,4);?></b></td>

                                    </tr>

                                </tbody>

                                <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<!-- KONTEN User -->
<?php elseif ($this->session->userdata('akses') == '3') : ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <?php
                $status = $tolak['p_verifikasi'];
                if($status == 3){ ?>
                    <?php echo $this->session->flashdata('msg0'); ?>
                <?php } 
                elseif ($status == 0) { ?>
                    <?php echo $this->session->flashdata('msg2'); ?>
            <?php }
            else { ?>
                    <?php echo $this->session->flashdata('msg'); ?>
            <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-text" data-background-color="orange">
                        <h4 class="card-title">Buku Rekomendasi</h4>
                        <p class="category">4 Rekomendasi Buku Digital Terbaik Untuk mu!</p>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <?php 
                                $lim=0;
                                    foreach($mfcm as $row) {
                                        $lim++;
                                        if($lim<=4){
                            ?>
                            <div class="col-sm-4 col-md-3">
                                <div class="thumbnail">
                                    <img src="<?php echo base_url('assets/img/buku/'.$row['b_sampul']);?>"
                                        alt="package-place">
                                    <div class="caption">
                                        <h5><small><b><?php echo $row['b_judul'];?></b></small></h5>
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
                                        <p><a href="<?php echo site_url('controller_landing/detailBuku/'.$row['b_idbuku']) ?>"
                                                class="btn btn-primary btn-block" role="button">Detil Buku</a></p>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-text" data-background-color="orange">
                        <h4 class="card-title">Buku Baru di Ulas</h4>
                        <p class="category">4 ulasan buku terbaru Untuk mu!</p>
                    </div>


                    <div class="card-content">
                        <?php
                            foreach ($ulasan as $row) {
                        ?>
                        <div class="col-lg-3 col-md-3">
                            <div class="card card-testimonial">
                                <div class="icon">
                                    <i class="material-icons">format_quote</i>
                                </div>
                                <div class="card-content">
                                    <h5 class="card-description">
                                        <p><?php echo $row->r_ulasan;?></p>
                                    </h5>
                                </div>
                                <div class="footer">
                                    <h4 class="card-title"><strong><?php echo $row->b_judul;?></strong> </h4>
                                    <h6 class="category">@<?php echo $row->p_nama;?></h6>
                                    <div class="card-avatar">
                                        <a
                                            href="<?php echo site_url('controller_landing/detailBuku/'.$row->b_idbuku) ?>">
                                            <?php if($row->b_sampul != "") { ?>
                                            <img src="<?php echo base_url('assets/img/buku/'.$row->b_sampul);?>">
                                            <?php }else{ ?>
                                            <img src="<?php echo base_url('assets/img/buku/book-default.jpg');?>">
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- KONTEN Demo -->

<?php else : ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">language</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Global Sales by Top Locations</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="table-responsive table-sales">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="<?php echo base_url(); ?>assets/img/flags/US.png">
                                                    </div>
                                                </td>
                                                <td>USA</td>
                                                <td class="text-right">
                                                    2.920
                                                </td>
                                                <td class="text-right">
                                                    53.23%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="<?php echo base_url(); ?>assets/img/flags/DE.png">
                                                    </div>
                                                </td>
                                                <td>Germany</td>
                                                <td class="text-right">
                                                    1.300
                                                </td>
                                                <td class="text-right">
                                                    20.43%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="<?php echo base_url(); ?>assets/img/flags/AU.png">
                                                    </div>
                                                </td>
                                                <td>Australia</td>
                                                <td class="text-right">
                                                    760
                                                </td>
                                                <td class="text-right">
                                                    10.35%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="<?php echo base_url(); ?>assets/img/flags/GB.png">
                                                    </div>
                                                </td>
                                                <td>United Kingdom</td>
                                                <td class="text-right">
                                                    690
                                                </td>
                                                <td class="text-right">
                                                    7.87%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="<?php echo base_url(); ?>assets/img/flags/RO.png">
                                                    </div>
                                                </td>
                                                <td>Romania</td>
                                                <td class="text-right">
                                                    600
                                                </td>
                                                <td class="text-right">
                                                    5.94%
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flag">
                                                        <img src="<?php echo base_url(); ?>assets/img/flags/BR.png">
                                                    </div>
                                                </td>
                                                <td>Brasil</td>
                                                <td class="text-right">
                                                    550
                                                </td>
                                                <td class="text-right">
                                                    4.34%
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-1">
                                <div id="worldMap" class="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header" data-background-color="rose" data-header-animation="true">
                        <div class="ct-chart" id="websiteViewsChart"></div>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button>
                            <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom"
                                title="Refresh">
                                <i class="material-icons">refresh</i>
                            </button>
                            <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                data-placement="bottom" title="Change Date">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                        <h4 class="card-title">Website Views</h4>
                        <p class="category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header" data-background-color="green" data-header-animation="true">
                        <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button>
                            <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom"
                                title="Refresh">
                                <i class="material-icons">refresh</i>
                            </button>
                            <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                data-placement="bottom" title="Change Date">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                        <h4 class="card-title">Daily Sales</h4>
                        <p class="category">
                            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in
                            today sales.</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> updated 4 minutes ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header" data-background-color="blue" data-header-animation="true">
                        <div class="ct-chart" id="completedTasksChart"></div>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button>
                            <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom"
                                title="Refresh">
                                <i class="material-icons">refresh</i>
                            </button>
                            <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                data-placement="bottom" title="Change Date">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                        <h4 class="card-title">Completed Tasks</h4>
                        <p class="category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">access_time</i> campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">weekend</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Bookings</p>
                        <h3 class="card-title">184</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">warning</i>
                            <a href="#pablo">Get More Space...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Website Visits</p>
                        <h3 class="card-title">75.521</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">store</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Revenue</p>
                        <h3 class="card-title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Last 24 Hours
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="fa fa-twitter"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Followers</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>Manage Listings</h3>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-image" data-header-animation="true">
                        <a href="#pablo">
                            <img class="img" src="<?php echo base_url(); ?>assets/img/card-2.jpg">
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button>
                            <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                data-placement="bottom" title="View">
                                <i class="material-icons">art_track</i>
                            </button>
                            <button type="button" class="btn btn-success btn-simple" rel="tooltip"
                                data-placement="bottom" title="Edit">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" class="btn btn-danger btn-simple" rel="tooltip"
                                data-placement="bottom" title="Remove">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <h4 class="card-title">
                            <a href="#pablo">Cozy 5 Stars Apartment</a>
                        </h4>
                        <div class="card-description">
                            The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to
                            "Naviglio" where you can
                            enjoy the main night life in Barcelona.
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="price">
                            <h4>$899/night</h4>
                        </div>
                        <div class="stats pull-right">
                            <p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-image" data-header-animation="true">
                        <a href="#pablo">
                            <img class="img" src="<?php echo base_url(); ?>assets/img/card-3.jpg">
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button>
                            <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                data-placement="bottom" title="View">
                                <i class="material-icons">art_track</i>
                            </button>
                            <button type="button" class="btn btn-success btn-simple" rel="tooltip"
                                data-placement="bottom" title="Edit">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" class="btn btn-danger btn-simple" rel="tooltip"
                                data-placement="bottom" title="Remove">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <h4 class="card-title">
                            <a href="#pablo">Office Studio</a>
                        </h4>
                        <div class="card-description">
                            The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio"
                            where you can enjoy
                            the night life in London, UK.
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="price">
                            <h4>$1.119/night</h4>
                        </div>
                        <div class="stats pull-right">
                            <p class="category"><i class="material-icons">place</i> London, UK</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-image" data-header-animation="true">
                        <a href="#pablo">
                            <img class="img" src="<?php echo base_url(); ?>assets/img/card-1.jpg">
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-actions">
                            <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                <i class="material-icons">build</i> Fix Header!
                            </button>
                            <button type="button" class="btn btn-default btn-simple" rel="tooltip"
                                data-placement="bottom" title="View">
                                <i class="material-icons">art_track</i>
                            </button>
                            <button type="button" class="btn btn-success btn-simple" rel="tooltip"
                                data-placement="bottom" title="Edit">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" class="btn btn-danger btn-simple" rel="tooltip"
                                data-placement="bottom" title="Remove">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <h4 class="card-title">
                            <a href="#pablo">Beautiful Castle</a>
                        </h4>
                        <div class="card-description">
                            The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio"
                            where you can enjoy
                            the main night life in Milan.
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="price">
                            <h4>$459/night</h4>
                        </div>
                        <div class="stats pull-right">
                            <p class="category"><i class="material-icons">place</i> Milan, Italy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- <div class="col-lg-8 col-md-8 col-xs-8"> -->
                <div class="card">
                    <div class="card-content">
                        <div class="material-datatables">
                            <b><?php echo $ket; ?></b><br /><br />

                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id.</th>
                                        <th>Tanggal</th>
                                        <th>Nama User</th>
                                        <th>Judul Buku</th>
                                        <th>Rating</th>
                                        <th class="disabled-sorting text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id.</th>
                                        <th>Tanggal</th>
                                        <th>Nama User</th>
                                        <th>Judul Buku</th>
                                        <th>Nilai Rating</th>
                                        <th class="disabled-sorting text-right">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                                        $no = 1;
                                                        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
                                                        foreach($rating as $row) {
                                                            $idbuku = $row['r_idbuku'];
                                                            $idrating = $row['r_id'];
                                                            $iduser = $row['r_iduser'];
                                                            $queryB = $mysqli->query("SELECT * FROM tbl_buku where b_idbuku =".$idbuku);
                                                            $databuku = $queryB->fetch_assoc();
                                                            $namabuku = $databuku['b_judul'];
                                                            $queryU = $mysqli->query("SELECT * FROM tbl_pengguna where p_id =".$iduser);
                                                            $datauser = $queryU->fetch_assoc();
                                                            $namauser = $datauser['p_nama'];
                                                            $nilai = $row['r_rating'];
                                                            $tgl = date('d-m-Y', strtotime($row['r_tanggalrating']));

                                                        ?>
                                    <tr>
                                        <td><?php echo $no;?></td>

                                        <!-- jika ada buku di dalam database maka tampilkan -->
                                        <td><?php echo $tgl;?></td>
                                        <td><?php echo $namauser;?></td>
                                        <td><?php echo $namabuku;?></td>
                                        <td><input type='text' name='vnilai' value=<?php echo $nilai;?>
                                                class='form-control text-center'></td>

                                        <td class="text-right">
                                            <button type='submit' onclick=""
                                                class="btn btn-md btn-success">Simpan</button>
                                        </td>
                                        <td><input name='vidrating' value=<?php echo $idrating;?> type='hidden'></td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>

                                <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>

                            </table>
                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                    <label>
                                        Cetak Dalam format PDF
                                    </label>
                                </div>
                                <a href="<?php echo $url_cetak; ?>" class="btn btn-rose btn-fill">
                                    Cetak PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>