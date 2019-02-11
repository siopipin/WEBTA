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
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <form action="<?php echo site_url('controller_laporan/simpan') ?>" method="POST">
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
                                                                        <td><input type='text' name='vnilai' value=<?php echo $nilai;?> class='form-control text-center'></td>
                                                                    
                                                                        <td class="text-right">
                                                                            <button type='submit' onclick="" class="btn btn-md btn-success">Simpan</button>
                                                                        </td>
                                                                        <td><input name='vidrating' value =<?php echo $idrating;?> type='hidden'></td>
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
                                            <!-- </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                     
        </div>
    </div>