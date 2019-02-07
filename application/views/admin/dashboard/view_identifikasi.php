<div class="content">
    <div class="container-fluid">
        <div class="col-sm-10 col-sm-offset-1">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="rose" id="wizardProfile">

                    <form action="<?php echo base_url().'controller_profile/updateIdentifikasi/'.$profile['p_id'] ?>" method='POST'
                        enctype='multipart/form-data'>
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                                Identifikasi Pengguna
                            </h3>

                            <?php if($this->session->userdata('akses') == '3') { ?>
                                <h5>Lengkapi informasi data diri untuk menggunakan semua layanan pada aplikasi ini.</h5>

                                
                            <?php }else{ ?>
                                <h5>Silahkan cek data identitas pengguna.</h5>
                            <?php } ?>

                            
                            <?php echo $this->session->flashdata('msg'); 
                        ?>
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li>
                                    <a href="#address" data-toggle="tab">Kartu Identitas</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">

                                    <?php if($this->session->userdata('akses') == '3') { ?>
                                        <h4 class="info-text"> Silahkan upload KTP / SIM / Kartu identitas lainnya.
                                        </h4>

                                        
                                    <?php }else{ ?>
                                        
                                    <?php } ?>
                                        
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">

                                        <div class="fileinput fileinput-new text-center col-sm-10 col-sm-offset-1"
                                            data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <?php if($profile['p_fotoktp'] != "") { ?>
                                                    <img src="<?php echo base_url('assets/img/ktp/'.$profile['p_fotoktp']); ?>" class="picture-src" id="wizardPicturePreview" title="" />
                                                <?php }else{ ?>
                                                    <img src="../../assets/img/image_placeholder.jpg" class="picture-src" id="wizardPicturePreview" title="" />
                                                <?php } ?>


                                            </div>


                                            <?php if($this->session->userdata('akses') == '3') { ?>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-rose btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="ktp" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>

                                                
                                            <?php }else{ ?>
                                                
                                            <?php } ?>


                                            


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next'
                                    value='Next' />

                                    <?php if($this->session->userdata('akses') == '3') { ?>
                                        <button type="submit" value="update"
                                    class="btn btn-finish btn-fill btn-rose btn-wd">Update</button>

                                                
                                            <?php }else{ ?>
                                                
                                            <?php } ?>
                                

                            </div>
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd'
                                    name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>