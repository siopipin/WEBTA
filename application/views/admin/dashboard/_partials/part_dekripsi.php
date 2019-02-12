<!-- INI KONTENT -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_page/databuku/') ?>">Buku</a>
                    <li class="active">Dekripsi Buku</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>
            
        </div>

        <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-4">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">filter_list</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Filter | Laporan Pengguna</h4>
                                
                <div class="card">
                    
                    <div class="card-content">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        

                                        <form role="form" action="" enctype="multipart/form-data" method="post"
                                            name="form" id="form">
                                            <input type="hidden" name="mode" value="e" />
                                            <fieldset>

                                                <!-- Pilih Buku yang akan disimpan dokumennya -->
                                                <select name="vnamaenkrip" class="selectpicker"
                                                    data-style="btn btn-primary btn-round" title="Pilih Judul Buku"
                                                    data-size="7">
                                                    <option disabled selected>Pilih Buku
                                                        yang dienkripsi
                                                    </option>
                                                    <?php foreach ($optjudul as $row): ?>
                                                    <option value="<?php echo $row->d_namaenkrip ?>">
                                                        <?php echo $row->b_judul ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <div class="tab-pane">
                                                    <div>
                                                        <span class="btn col-lg-12 btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Pilih
                                                                File</span>
                                                            <input class="required" type="file" id="file" name="file" />
                                                        </span>

                                                    </div>
                                                    <label class="warning">Max Size: 3MB</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12 form-group label-floating">
                                                        <label class="warning">Key</label>
                                                        <input class="required form-control" placeholder="Password"
                                                            id="pass" name="pass" type="password" value="">
                                                    </div>
                                                </div>
                                                <div id="errors"></div>

                                                <div class="form-footer text-right">
                                                    <button type="submit" name="dekripfile"
                                                        class="btn btn-primary center-block" name="enkrip"
                                                        value="Dekrip File">Submit</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <?php if (!empty($alert)){ ?>
                                    <div class='alert alert-danger alert-error'>
                                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                        <center>
                                            <?php echo $alert; ?>
                                        </center>
                                    </div>
                                    <?php } elseif (!empty($success)) { ?>
                                    <div class='alert alert-success'>
                                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                        <center>
                                            <?php echo $success; ?>
                                        </center>
                                    </div>
                                    <?php }	?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-xs-8">
                        <div class="card">
                            <div class="card-content">
                                <div class="material-datatables">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Rating</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                             

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Rating</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                               

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                $no = 1;
                                foreach($dokumen as $row) {
                                    
                                    $tgl = date('d-m-Y', strtotime($row->d_tanggal));
                                    
                                ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <!-- jika ada buku di dalam database maka tampilkan -->
                                                <td><?php echo $tgl;?></td>
                                                <td>
                                                    <?php echo $row->d_namaenkrip;?>
                                                </td>
                                                <td><?php echo $row->d_key;?></td>
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