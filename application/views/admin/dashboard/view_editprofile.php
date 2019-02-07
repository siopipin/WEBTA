<div class="content">
    <div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1">
        <!--      Wizard container        -->
        <div class="wizard-container">
            <div class="card wizard-card" data-color="rose" id="wizardProfile">
                    
                    <form action="<?php echo base_url().'controller_profile/update/'.$profile['p_id'] ?>" method='POST' enctype='multipart/form-data'>

                    
                    <div class="wizard-header">
                        <?php echo $this->session->flashdata('msg'); 
                        ?>
                        <h3 class="wizard-title">
                            Edit Profile Pengguna
                        </h3>
                        <h5>Lengkapi informasi data diri untuk menggunakan semua layanan pada aplikasi ini.</h5>
                        
                    </div>
                    <div class="wizard-navigation">
                        <ul>
                            <li>
                                <a href="#about" data-toggle="tab">Tentang</a>
                            </li>
                            <li>
                                <a href="#account" data-toggle="tab">Personal</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="about">
                            <div class="row">
                                <h4 class="info-text"> Mulai dengan mengisi informasi dasar tentang kamu !</h4>
                                <div class="col-sm-4 col-sm-offset-1">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <?php if($profile['p_fotoprofil'] != "") { ?>
                                                <img src="<?php echo base_url('assets/img/profil/'.$profile['p_fotoprofil']); ?>" class="picture-src" id="wizardPicturePreview" title="" />
                                            <?php }else{ ?>
                                                <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                            <?php } ?>

                                            
                                            <input type="file" name="foto" id="wizard-picture" />
                                        </div>
                                        <h6>Choose Picture</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Lengkap
                                                <small>(required)</small>
                                            </label>
                                            <input name="vnama" type="text" class="form-control" value="<?php echo $profile['p_nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">record_voice_over</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Pengguna
                                                <small>(required)</small>
                                            </label>
                                            <input name="vnamapengguna" type="text" class="form-control" value="<?php echo $profile['p_namapengguna'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email
                                                <small>(required)</small>
                                            </label>
                                            <input name="vemail" type="email" class="form-control" value="<?php echo $profile['p_email'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="account">
                            <h4 class="info-text"> Isi data diri personal anda </h4>
                            <div class="row">
                                <div class="col-lg-12 col-lg-offset-1">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">place</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tempat Lahir
                                                    <small>(required)</small>
                                                </label>
                                                <input name="vtempatlahir" type="text" class="form-control" value="<?php echo $profile['p_tempatlahir'] ?>">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">smartphone</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">No. Hp
                                                    <small>(required)</small>
                                                </label>
                                                <input name="vnohp" type="text" class="form-control" value="<?php echo $profile['p_nohp'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Lahir
                                                    <small>(required)</small>
                                                </label>
                                                <input name="vtanggallahir" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">portrait</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Jenis Kelamin
                                                    <small>(required)</small>
                                                </label>
                                                <select class="form-control" name="vjeniskelamin"
                                                    value="Laki-laki" data-placeholder="laki-laki"
                                                    required>
                                                    <option value="Laki-laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">business</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Alamat Lengkap
                                                    <small>(required)</small>
                                                </label>
                                                <input name="valamat" type="text" class="form-control" value="<?php echo $profile['p_alamat'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="wizard-footer">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />

                            
                            <?php if($this->session->userdata('akses') == '3') { ?>
                                <button type="submit" value="update" class="btn btn-finish btn-fill btn-rose btn-wd">Update</button>

                                                
                             <?php }else{ ?>
                                <a href="<?php echo site_url('controller_kelolapengguna/hapusPengguna/'.$profile['p_id']) ?>"
                                class="btn btn-finish btn-fill btn-danger btn-wd">Hapus</a>
                                <a href="<?php echo site_url('controller_kelolapengguna/daftarpengguna/') ?>"
                                class="btn btn-finish btn-fill btn-rose btn-wd">Kembali Ke Daftar Pengguna</a>                  
                                <?php } ?>
                            
                        </div>
                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- wizard container -->
    </div>
</div>

