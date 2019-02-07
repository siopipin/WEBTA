<!-- INI KONTENT -->
<div class="content">
    <div class="container-fluid">
        <div class="row">


            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_page/databuku/') ?>">Buku</a>
                    <li class="active">Edit Buku</li>
                    </li>
                </ol>
                <?php echo $this->session->flashdata('msg'); 
                ?>
            </div>

            <div class="col-md-12">
                <div class="card">

                    <?php echo form_open_multipart('controller_buku/update/'.$edit['b_idbuku'], array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                    <div class="card-header card-header-text" data-background-color="rose">
                        <h4 class="card-title">Edit Buku

                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <?php
                                    if (!empty($error)) {
                                    echo $error;
                                }
                                ?>
                        </div>



                        <div class="row">
                            <label class="col-sm-2 label-on-left">Id Buku</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="ID Buku" name="vidbuku"
                                        value="<?php echo $edit['b_idbuku']; ?>" readonly="readonly">
                                    <span class="text-danger"><?php echo form_error('vidbuku'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Judul Buku</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Judul Buku" name="vjudul"
                                        value="<?php echo $edit['b_judul']; ?>">
                                    <span class="text-danger"><?php echo form_error('vjudul'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Deskripsi</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <textarea name="vdeskripsi" id="vdeskripsi" placeholder="Deskripsi Buku"
                                        class="form-control" rows="7"><?php echo $edit['b_deskripsi']; ?></textarea>
                                    <span class="text-danger"><?php echo form_error('vdeskripsi'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left">ISBN</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="ISBN" name="visbn"
                                        value="<?php echo $edit['b_isbn']; ?>">
                                    <span class="text-danger"><?php echo form_error('visbn'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Klasifikasi</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <!--
                                        <input type="text" class="form-control" placeholder="Klasifikasi"
                                            name="vklasifikasi">
                                            -->

                                    <?php $klasifikasi = $edit['b_klasifikasi']; ?>
                                    <select class="form-control" id="sklasifikasi" name="vklasifikasi"
                                        data-placeholder="Klasifikasi" onchange="demo.showSwal('second-clasification')"
                                        autocomplete="off" required>
                                        <option value="Ilmu Komputer, Informasi & karya Umum"
                                            <?php if($klasifikasi == "Ilmu Komputer, Informasi & karya Umum") echo "selected"; ?>>
                                            Ilmu Komputer, Informasi & karya Umum</option>
                                        <option value="Filsafat & Psikologi"
                                            <?php if($klasifikasi == "Filsafat & Psikologi") echo "selected"; ?>>
                                            Filsafat & Psikologi</option>
                                        <option value="Agama" <?php if($klasifikasi == "Agama") echo "selected"; ?>>Ilmu
                                            Sosial, sosiologi dan antropologi</option>
                                        <option value="Ilmu Sosial, sosiologi dan antropologi"
                                            <?php if($klasifikasi == "Ilmu Sosial, sosiologi dan antropologi") echo "selected"; ?>>
                                            Ilmu Sosial, sosiologi dan antropologi</option>
                                        <option value="Bahasa" <?php if($klasifikasi == "Bahasa") echo "selected"; ?>>
                                            Bahasa</option>
                                        <option value="Sains" <?php if($klasifikasi == "Sains") echo "selected"; ?>>
                                            Sains</option>
                                        <option value="Teknologi"
                                            <?php if($klasifikasi == "Teknologi") echo "selected"; ?>>Teknologi</option>
                                        <option value="Seni & Rekreasi"
                                            <?php if($klasifikasi == "Seni & Rekreasi") echo "selected"; ?>>Seni &
                                            Rekreasi</option>
                                        <option value="Sastra" <?php if($klasifikasi == "Sastra") echo "selected"; ?>>
                                            Sastra</option>
                                        <option value="Sejarah & Geografi"
                                            <?php if($klasifikasi == "Sejarah & Geografi") echo "selected"; ?>>Sejarah &
                                            Geografi</option>

                                    </select>
                                    <span class="text-danger"><?php echo form_error('vklasifikasi'); ?></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-sm-2 label-on-left">Pengarang</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Pengarang" name="vpengarang"
                                        value="<?php echo $edit['b_pengarang']; ?>">
                                    <span class="text-danger"><?php echo form_error('vpengarang'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Penerbit</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" class="form-control" placeholder="Penerbit" name="vpenerbit"
                                        value="<?php echo $edit['b_penerbit']; ?>">
                                    <span class="text-danger"><?php echo form_error('vpenerbit'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Tahun Terbit</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="date" class="form-control datetimepicker" name="vtahunterbit"
                                        value="<?php echo $edit['b_tahunterbit']; ?>">
                                    <span class="text-danger"><?php echo form_error('vtahunterbit'); ?></span>
                                </div>
                            </div>
                        </div>

                        

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Cover Buku</label>
                            <div class="col-sm-10">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <div>
                                        <span class="img-container">
                                            <div class="img-container">
                                                <?php if($edit['b_sampul'] != "") { ?>
                                                <img src="<?php echo base_url('assets/img/buku/'.$edit['b_sampul']);?>"
                                                    style="width:145px;height:200px;">
                                                <?php }else{ ?>
                                                <img src="<?php echo base_url('assets/img/buku/book-default.jpg');?>"
                                                    style="width:145px;height:200px;">
                                                <?php } ?>
                                            </div>
                                        </span>
                                        <span class="btn btn-rose btn-round btn-file">
                                            Pilih Sampul
                                            <input type="file" name="sampul" />
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer text-right">
                            <button type="submit" value="update" class="btn btn-rose btn-fill">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Update -->