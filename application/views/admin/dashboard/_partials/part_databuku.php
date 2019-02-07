<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_page/databuku/') ?>">Buku</a>
                    <li class="active">Daftar Buku</li>
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
                        <h4 class="card-title">Daftar Buku</h4>
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
                                        <th>Pengarang</th>
                                        <th>Rating</th>
                                        <th class="disabled-sorting text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Pengarang</th>
                                        <th>Rating</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                $no = 1;
                                foreach($tbl_buku->result() as $row) {
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
                                        <td><?php echo $row->b_pengarang;?></td>
                                        <td class="text-center"><?php echo substr($row->b_rating,0,3);?></td>
                                        <td class="text-right">
                                            <a href="<?php echo site_url('controller_page/editbuku/'.$row->b_idbuku) ?>"
                                                class="btn btn-simple btn-warning btn-icon"><i
                                                    class="material-icons">edit</i></a>

                                            <button class="btn btn-simple btn-danger btn-icon" onclick="validate(this)" value="<?php echo $row->b_idbuku;?>">
                                                <li class="material-icons">
                                                    close
                                                </li>
                                            </button>
                                            <!-- <a href="#" onclick="validate(this)" value="<?php echo $row->b_idbuku;?>"
                                                class="btn btn-simple btn-danger btn-icon"><i
                                                    class="material-icons">close</i></a> -->

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

<!-- modal dengan sweetalert -->
<script src="<?php echo base_url()?>assets/js/sweetalert2.js"></script>
<script>

function validate(a) {
    var id = a.value;
    swal({
        title: 'Yakin Hapus Data Buku ?',
        text: "Buku akan terhapus di sistem",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak!',
        reverseButtons: false,
        buttonsStyling: true
    }).then(function() {
        $(location).attr('href','<?php echo base_url()?>controller_buku/delete/'+id);
    }, function(dismiss) {
        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        if (dismiss === 'cancel') {
        }
    });
}
</script>