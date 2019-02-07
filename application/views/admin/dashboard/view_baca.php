<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3 class="title text-center">Selamat Membaca Buku <br><b
                        style="color:orange"><?php echo $cek['b_judul']; ?></b></h3>
                <br />
                <div class="nav-center">
                    <ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist">

                        <li class="active">
                            <a href="#description-1" role="tab" data-toggle="tab">
                                <i class="material-icons">info</i> Informasi
                            </a>
                        </li>
                        <li>
                            <a href="#schedule-1" role="tab" data-toggle="tab">
                                <i class="material-icons">lock_open</i> Dekripsi
                            </a>
                        </li>
                        <li>
                            <a href="#tasks-1" role="tab" data-toggle="tab">
                                <i class="material-icons">chrome_reader_mode</i> Baca Buku
                            </a>
                        </li>
                        <li>
                            <a href="#tasks-2" role="tab" data-toggle="tab">
                                <i class="material-icons">stars</i> Beri Ulasan
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="description-1">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Deskripsi buku</h4>
                                <p class="category">
                                    Informasi data buku
                                </p>
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <div class="card-content">
                                <div class="col-md-12">
                                    <ul class="timeline timeline-simple">
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge danger">
                                                <i class="material-icons">card_travel</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-danger">Deskripsi </span>
                                                </div>
                                                <div class="timeline-body">
                                                    <div class="row">
                                                        <div class="col-md-8 text-justify">
                                                            <p><?php echo $cek['b_deskripsi'] ?></p>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <img src="<?php echo base_url('assets/img/buku/'.$cek['b_sampul']);?>"
                                                                alt="Sampul">
                                                            <?php 
                                                                $now = new DateTime();
                                                                $tglkembali = $buku['t_tanggalkembali'];
                                                                $date = new DateTime($tglkembali);
                                                                $sisawaktu = $date->diff($now)->format("%d hari, %h jam dan %i menit");
                                                            ?>
                                                            <button class="btn btn-primary btn-block"><small><?php echo $sisawaktu;?></small> </button>
                                                            <button class="btn btn-danger btn-block" onclick="validate(this)" value="<?php echo $buku['t_idtransaksi'];?>">Kembalikan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <h6>
                                                    <i class="ti-time"></i> 11 hours ago via Twitter
                                                </h6> -->
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge info">
                                                <i class="material-icons">fingerprint</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-info">ISBN</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p><?php echo $cek['b_isbn'] ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge success">
                                                <i class="material-icons">extension</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-success">Lainnya</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p><b>Klasifikasi :</b>
                                                        <?php echo $cek['b_klasifikasi'] ?></p>
                                                    <hr>
                                                    <p><b>Text Bahasa :</b>
                                                        <?php echo $cek['b_bahasa'] ?></p>
                                                    <hr>
                                                    <p><b>Pengarang :</b>
                                                        <?php echo $cek['b_pengarang'] ?></p>
                                                    <hr>
                                                    <p><b>Penerbit :</b>
                                                        <?php echo $cek['b_penerbit'] ?></p>
                                                    <hr>
                                                    <p><b>Tahun Terbit :</b>
                                                        <?php echo $cek['b_tahunterbit'] ?></p>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="schedule-1">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dekripsi Buku</h4>
                                <p class="category">
                                    Buku kunci buku dengan key
                                </p>
                            </div>
                            <div class="card-content">
                                Efficiently unleash cross-media information without cross-media value. Quickly maximize
                                timely deliverables for real-time schemas.
                                <br />
                                <br /> Dramatically maintain clicks-and-mortar solutions without functional solutions.
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tasks-1">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Baca Buku Online</h4>
                                <p class="category">
                                    E-Reader Buku
                                </p>
                            </div>
                            <?php  $fileName = $dokumen['d_namadekrip']; ?>
                            <?php echo "<script type='text.javascript'>alert('".base_url('decrypt/'.$fileName)."');</script>";?>
                            <div class="card-content">
                                <object data="<?php
                                echo base_url('decrypt/'.$fileName); 
                                ?>" 
                                type="application/pdf" width="100%" height="700px">
                                    <p>Alternative text - include a link <a href="myfile.pdf">to the PDF!</a></p>
                                </object>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tasks-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Review dan Rating</h4>
                                <p class="category">
                                    Beri ulasan buku 
                                </p>
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <div class="card-content">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">mail_outline</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Form Ulasan</h4>
                                        <form method="POST" action="<?php echo base_url('controller_buku/ulas/'.$cek['b_idbuku']) ?>">
                                            
                                            <div class="form-group label-floating">
                                                <label class="control-label">Beri Ulasan Buku</label>
                                                <textarea name="vulasan" rows="7" class="form-control"> <?php echo $ulasan['r_ulasan']; ?> </textarea>
                                                <span class="text-danger"><?php echo form_error('vulasan'); ?></span>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Beri Rating</label>
                                                <input class="rating" type="hidden" value="5">
                                                <select class="form-control" name="vrating" value="<?php echo $ulasan['r_ulasan']; ?>" required>
                                                    <!--<option default value=>Beri rating</option>-->
                                                    <option value="10">Sangat Bagus</option>
                                                    <option value="8">Bagus</option>
                                                    <option value="6">Cukup Bagus</option>
                                                    <option value="4">Kurang Bagus</option>
                                                    <option value="2">Tidak Bagus</option>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('vrating'); ?></span>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vcekbox"> Saya memberi ulasan
                                                    sesuai untuk buku yang telah saya baca.
                                                </label>
                                                
                                            </div> 
                                            <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>assets/js/sweetalert2.js"></script>
<script>

function validate(a) {
    var id = a.value;
    swal({
        title: 'Yakin ingin kembalikan buku?',
        text: "Buku akan terhapus dari daftar buku terpinjam",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak!',
        reverseButtons: false,
        buttonsStyling: true
    }).then(function() {
        $(location).attr('href','<?php echo base_url()?>controller_buku/kembalikan/'+id);
    }, function(dismiss) {
        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        if (dismiss === 'cancel') {
        }
    });
}
</script>