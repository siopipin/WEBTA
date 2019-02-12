<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_dashboard/index/') ?>">Dashboard</a>
                    <li class="active">Laporan Rating</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Daftar Rekomendasi</h4>
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
                                                class="btn btn-primary btn-block" role="button">Rincian Buku</a></p>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">filter_list</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Filter | Laporan Rating</h4>
                                <legend>Filter Berdasarkan</legend>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <form action="" method="GET">
                                            <select name="filter" id="filter" class="selectpicker"
                                                data-style="btn btn-primary btn-round" title="Single Select"
                                                data-size="7">
                                                <option disabled selected>Pilih Filter</option>
                                                <option value="1">Berdasarkan Nama</option>
                                                <option value="2">Berdasarkan Buku</option>

                                            </select>

                                            <div id="form-nama">
                                                <label>Nama Member</label><br>
                                                <select name="member" class="selectpicker"
                                                    data-style="btn btn-primary btn-round" title="Single Select"
                                                    data-size="12">
                                                    <option value="">Pilih</option>
                                                    <?php
                                                      foreach ($optionnama as $row) { ?>
                                                    <option value="<?php echo $row->p_namapengguna ?>">
                                                        <?php echo $row->p_namapengguna ?>
                                                    </option>
                                                    <?php }
                                                 ?>
                                                </select>
                                            </div>

                                            <div id="form-judul">
                                                <label>Judul Buku</label><br>
                                                <select name="buku" class="selectpicker"
                                                    data-style="btn btn-primary btn-round" title="Single Select"
                                                    data-size="12">
                                                    <option value="">Pilih Judul</option>
                                                    <?php
                                                      foreach ($optionjudul as $row) { ?>
                                                    <option value="<?php echo $row->b_judul ?>">
                                                        <?php echo $row->b_judul ?>
                                                    </option>
                                                    <?php }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="category form-category">
                                                <small>*</small> Required fields</div>
                                            <div class="form-footer text-right">
                                                <div class="checkbox pull-left">
                                                    <label>
                                                        <a
                                                            href="<?php echo base_url('controller_laporan/laporanRating'); ?>">Reset
                                                            Filter</a>
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-rose btn-fill">Tampilkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-xs-8">
                        <div class="card">
                            <div class="card-content">
                                <div class="material-datatables">
                                    <b><?php echo $ket; ?></b><br /><br />

                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Rating</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Judul</th>
                                                <th>Nilai</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Rating</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Judul</th>
                                                <th>Nilai</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                $no = 1;
                                foreach($transaksi as $row) {
                                    
                                    $tgl = date('d-m-Y', strtotime($row->r_tanggalrating));
                                    
                                ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <!-- jika ada buku di dalam database maka tampilkan -->
                                                <td><?php echo $tgl;?></td>
                                                <td>
                                                    <div class="img-container">
                                                        <?php if($row->p_fotoprofil != "") { ?>
                                                        <img src="<?php echo base_url('assets/img/profil/'.$row->p_fotoprofil);?>"
                                                            style="width:50px;height:50px;">
                                                        <?php }else{ ?>
                                                        <img src="<?php echo base_url('assets/img/profil/default.png');?>"
                                                            style="width:50px;height:50px;">
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td><?php echo $row->p_namapengguna;?></td>
                                                <td><?php echo $row->b_judul;?></td>


                                                <td>
                                                    <form
                                                        action="<?php echo site_url('controller_laporan/updaterating/'.$row->r_id) ?>"
                                                        method="POST">
                                                        <input type="text" class="form-control text-center"
                                                            name="vrating" value="<?php echo $row->r_rating;?>">
                                                    </form>
                                                </td>

                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>

                                        <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
                                        <!-- Load file plugin js jquery-ui -->
                                        <script>
                                        $(document).ready(function() { // Ketika halaman selesai di load

                                            $('#form-nama, #form-judul')
                                                .hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                                            $('#filter').change(function() { // Ketika user memilih filter
                                                if ($(this).val() ==
                                                    '1') { // Jika filter nya 1 (per tanggal)
                                                    $('#form-judul')
                                                        .hide(); // Sembunyikan form bulan dan tahun
                                                    $('#form-nama').show(); // Tampilkan form tanggal
                                                } else { // Jika filter nya 2 (per bulan)
                                                    $('#form-nama')
                                                        .hide(); // Sembunyikan form tanggal
                                                    $('#form-judul')
                                                        .show(); // Tampilkan form bulan dan tahun
                                                }
                                                $('#form-nama select, #form-judul')
                                                    .val(
                                                        ''
                                                    ); // Clear data pada textbox tanggal, combobox bulan & tahun
                                            })
                                        })
                                        </script>
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
    </div>