<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_dashboard/') ?>">Dashboard</a>
                    <li class="active">Daftar Pesan</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Daftar Pesan Terbaru</h4>
                        <div class="material-datatables">

                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Judul</th>
                                        <th>Isi Pesan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Judul</th>
                                        <th>Isi Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                        $no = 1;
                        foreach($pesan as $row) {
                            
                            $tgl = date('d-m-Y', strtotime($row->pe_tanggal));
                            
                        ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <!-- jika ada buku di dalam database maka tampilkan -->
                                        <td><?php echo $tgl;?></td>
                                        <td>
                                            <?php echo $row->pe_nama;?>
                                        </td>
                                        <td><?php echo $row->pe_email;?></td>
                                        <td><?php echo $row->pe_judul;?></td>
                                        <td><?php echo $row->pe_isi;?></td>
                                        


                                        <td>
                                            <form
                                                action="<?php echo site_url('controller_dashboard/updatepesan/'.$row->pe_id) ?>"
                                                method="POST">
                                                <button type="input" class="btn text-center">Terbaca</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col-md-12 -->
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Daftar Terbaca</h4>
                        <div class="material-datatables">

                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Judul</th>
                                        <th>Isi Pesan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Judul</th>
                                        <th>Isi Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                        $no = 1;
                        foreach($pesanlama as $row) {
                            
                            $tgl = date('d-m-Y', strtotime($row->pe_tanggal));
                            
                        ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <!-- jika ada buku di dalam database maka tampilkan -->
                                        <td><?php echo $tgl;?></td>
                                        <td>
                                            <?php echo $row->pe_nama;?>
                                        </td>
                                        <td><?php echo $row->pe_email;?></td>
                                        <td><?php echo $row->pe_judul;?></td>
                                        <td><?php echo $row->pe_isi;?></td>
                                        


                                        <td>
                                            <form
                                                action="<?php echo site_url('controller_dashboard/hapus/'.$row->pe_id) ?>"
                                                method="POST">
                                                <button type="input" class="btn btn-danger text-center">Hapus</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>