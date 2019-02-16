<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_dashboard/index/') ?>">Dashboard</a>
                    <li class="active">Laporan Pinjam</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">filter_list</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Filter | Laporan Pinjam</h4>
                                <legend>Filter Berdasarkan</legend>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <form action="" method="GET">
                                            <select name="filter" id="filter" class="selectpicker"
                                                data-style="btn btn-primary btn-round" title="Single Select"
                                                data-size="7">
                                                <option disabled selected>Pilih Filter</option>
                                                <option value="1">Berdasarkan Tanggal</option>
                                                <option value="2">Berdasarkan Bulan</option>
                                                <option value="3">Berdasarkan Tahun</option>
                                            </select>

                                            <div id="form-tanggal">
                                                <label>Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" />
                                            </div>

                                            <div id="form-bulan">
                                                <label>Bulan</label><br>
                                                <select name="bulan" class="selectpicker"
                                                    data-style="btn btn-primary btn-round" title="Single Select"
                                                    data-size="12">
                                                    <option value="">Pilih</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>

                                            <div id="form-tahun">
                                                <label>Tahun</label><br>
                                                <select name="tahun" class="selectpicker"
                                                    data-style="btn btn-primary btn-round" title="Single Select"
                                                    data-size="12">
                                                    <option value="">Pilih</option>
                                                    <?php
                                                      foreach ($optiontahunpinjam as $row) { ?>
                                                    <option value="<?php echo $row->tahun ?>"><?php echo $row->tahun ?>
                                                    </option>
                                                    <?php }
                                                 ?>
                                                </select>
                                            </div>
                                            <div class="category form-category">
                                                <small>*</small> Harus Diisi </div>
                                            <div class="form-footer text-right">
                                                <div class="checkbox pull-left">
                                                    <label>
                                                        <a
                                                            href="<?php echo base_url('controller_laporan/laporanPinjam'); ?>">Reset
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
                                                <th>Tanggal Pinjam</th>                                         
                                                <th>Tanggal Kembali</th>
                                                <th>Nama</th>
                                               
                                                <th class="disabled-sorting text-right">Buku</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Pinjam</th>                                         
                                                <th>Tanggal Kembali</th>
                                                <th>Nama</th>                                              
                                                <th class="disabled-sorting text-right">Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                $no = 1;
                                foreach($transaksi as $row) {
                                    $tgl = date('d-m-Y', strtotime($row->t_tanggalpinjam));
                                    $tglkembali = date('d-m-Y', strtotime($row->t_tanggalkembali));
                                    

                                ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <!-- jika ada buku di dalam database maka tampilkan -->
                                                <td><?php echo $tgl;?></td>
                                                <td><?php echo $tglkembali;?></td>                                                
                                                <td><?php echo $row->p_nama;?></td>
                                                <td><?php echo $row->b_judul;?></td>                                                                                                 
                                                </td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>

                                        <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
                                        <!-- Load file plugin js jquery-ui -->
                                        <script>
                                        $(document).ready(function() { // Ketika halaman selesai di load
                                            $('.input-tanggal').datepicker({
                                                dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                                            });
                                            $('#form-tanggal, #form-bulan, #form-tahun')
                                                .hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                                            $('#filter').change(function() { // Ketika user memilih filter
                                                if ($(this).val() ==
                                                    '1') { // Jika filter nya 1 (per tanggal)
                                                    $('#form-bulan, #form-tahun')
                                                        .hide(); // Sembunyikan form bulan dan tahun
                                                    $('#form-tanggal').show(); // Tampilkan form tanggal
                                                } else if ($(this).val() ==
                                                    '2') { // Jika filter nya 2 (per bulan)
                                                    $('#form-tanggal')
                                                        .hide(); // Sembunyikan form tanggal
                                                    $('#form-bulan, #form-tahun')
                                                        .show(); // Tampilkan form bulan dan tahun
                                                } else { // Jika filternya 3 (per tahun)
                                                    $('#form-tanggal, #form-bulan')
                                                        .hide(); // Sembunyikan form tanggal dan bulan
                                                    $('#form-tahun').show(); // Tampilkan form tahun
                                                }
                                                $('#form-tanggal input, #form-bulan select, #form-tahun select')
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