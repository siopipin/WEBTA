<!-- INI KONTENT -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_page/databuku/') ?>">Buku</a>
                    <li class="active">Enkripsi Buku</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

            
                
            <div class="col-sm-8 col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Enkripsi FIle -
                            <small class="category">AES - 128</small>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="nav nav-pills nav-pills-rose nav-stacked">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab">Pilih Buku</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        Pilih data buku yang akan dienkripsi! Daftar
                                        buku yang akan tampil adalah buku yang belum
                                        memiliki file dokumen buku digital.

                                        <form role="form" action="" enctype="multipart/form-data" method="post"
                                            name="form" id="form">
                                            <input type="hidden" name="mode" value="e" />
                                            <fieldset>

                                                <!-- Pilih Buku yang akan disimpan dokumennya -->
                                                <select name="vidbuku" class="selectpicker"
                                                    data-style="btn btn-primary btn-round" title="Pilih Judul Buku"
                                                    data-size="7">
                                                    <option disabled selected>Pilih Buku
                                                        yang dienkripsi
                                                    </option>
                                                    <?php foreach ($optjudul as $row): ?>
                                                    <option value="<?php echo $row->b_idbuku ?>">
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
                                                        <input class="form-control" placeholder="Password" id="pass"
                                                            name="pass" type="hidden" value="">
                                                    </div>
                                                </div>
                                                <div id="errors"></div>

                                                <div class="form-footer text-right">
                                                    <button type="submit" name="enkripfile"
                                                        class="btn btn-primary center-block" name="enkrip"
                                                        value="Enkrip File">Submit</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <?php if (!empty($alert)) {?>
                                    <div class='alert alert-danger alert-error'>
                                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                        <center>
                                            <?php echo $alert; ?>
                                        </center>
                                    </div>
                                    <?php } elseif (!empty($success)) {?>
                                    <div class='alert alert-success'>
                                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                        <center>
                                            <?php echo $success; ?>
                                        </center>
                                    </div>
                                    <?php }?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>