<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_dashboard/index/') ?>">Dashboard</a>
                    <li class="active">Riwayat Peminjaman</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>
            <div class="col-md-12">
                

                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Daftar Riwayat Buku</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th class="disabled-sorting text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                $no = 1;
                                foreach($riwayat as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <!-- jika ada buku di dalam database maka tampilkan -->
                                        <td>
                                            <div class="img-container">
                                                <?php if($row->b_sampul != "") { ?>
                                                <img src="<?php echo base_url('assets/img/buku/'.$row->b_sampul);?>"
                                                    style="width:50px;height:50px;">
                                                <?php }else{ ?>
                                                <img src="<?php echo base_url('assets/img/buku/book-default.jpg');?>"
                                                    style="width:50px;height:50px;">
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td><?php echo $row->b_judul;?></td>
                                        <td><?php echo $row->t_tanggalpinjam;?></td>
                                        <td class="text-center"><?php echo $row->t_tanggalkembali;?></td>
                                        <td class="text-right">
                                            <a href="<?php echo site_url('controller_landing/detailBuku/'.$row->b_idbuku) ?>"
                                                class="btn btn-simple btn-warning btn-icon">Detail Buku</a>
                                         
                                        </td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
            </div>
        </div>
    </div>
</div>