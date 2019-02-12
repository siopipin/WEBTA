<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_kelolapengguna/daftarPengguna/') ?>">Pengguna</a>
                    <li class="active">Daftar Pengguna</li>
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
                        <h4 class="card-title">Daftar Pengguna</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Upload KTP</th>
                                        
                                        <th class="disabled-sorting text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Upload KTP</th>
                                        
                                        <th class="disabled-sorting text-center">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                $no = 1;
                                foreach($pengguna->result() as $row) {
                                    $status = $row->p_fotoktp;
                                    if($status == NULL){
                                        $status = "Belum Selesai";
                                    }
                                    else
                                    {
                                        $status = "Selesai";
                                    }

                                ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <!-- jika ada buku di dalam database maka tampilkan -->
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
                                        <td><?php echo $row->p_nama;?></td>
                                        <td><?php echo $row->p_createat;?></td>
                                        
                                        <td><?php echo $status;?></td>
                                        <td class="text-right">

                                            <?php
                                                $status = $row->p_verifikasi;
                                                if($status == 0){ ?>
                                                    
                                                    <a href="<?php echo site_url('controller_kelolapengguna/ktp/'.$row->p_id) ?>"
                                                    class="btn btn-sm btn-rose btn-icon">Lihat KTP</a>
                                                    <a href="<?php echo site_url('controller_kelolapengguna/editPengguna/'.$row->p_id) ?>"
                                                    class="btn btn-sm btn-warning btn-icon">Setujui</a>

                                                    <form
                                                        action="<?php echo site_url('controller_dashboard/updateverifikasi/'.$row->p_id) ?>"
                                                        method="POST">
                                                        <button type="input" class="btn btn-sm btn-danger btn-icon">Kirim Peringatan Perbaharui Identitas</button>
                                                    </form>

                                                <?php }
                                                elseif($status == 3) 
                                                { ?>
                                                    
                                                    <a href="<?php echo site_url('controller_profile/profile/'.$row->p_id) ?>"
                                                    class="btn btn-md btn-default">Ditolak</a>
                                                <?php } 
                                                else { 
                                                ?>
                                                    <a href="<?php echo site_url('controller_profile/profile/'.$row->p_id) ?>"
                                                    class="btn btn-md btn-success">Rincian</a>
                                                <?php } ?>

                                            
                                        </td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
    </div>
</div>