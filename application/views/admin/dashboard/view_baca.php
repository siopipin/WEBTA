<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_buku/bukuTerpinjam/') ?>">Buku Terpinjam</a>
                    <li class="active">Baca Buku</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

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
                                                            <button
                                                                class="btn btn-primary btn-block"><small><?php echo $sisawaktu;?></small>
                                                            </button>
                                                            <button class="btn btn-danger btn-block"
                                                                onclick="validate(this)"
                                                                value="<?php echo $buku['t_idtransaksi'];?>">Kembalikan</button>
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
                    <div class="tab-pane" id="tasks-1">
                        <div class="card">
                            
                            <?php  $fileName = $dokumen['d_namadekrip']; ?>
                            <?php echo "<script type='text.javascript'>alert('".base_url('decrypt/'.$fileName)."');</script>";?>


                            <div class="card-content" style="height: 950px;">


                                <div id="sidebar">
                                    <div id="panels">
                                        <!-- <input id="searchBox" placeholder="search" type="search"> -->

                                        <!-- <a id="show-Search" class="show_view icon-search" data-view="Search">Search</a> -->
                                        <a id="show-Toc" class="show_view icon-list-1 active" data-view="Toc">TOC</a>
                                        <a id="show-Bookmarks" class="show_view icon-bookmark"
                                            data-view="Bookmarks">Bookmarks</a>
                                        <!-- <a id="show-Notes" class="show_view icon-edit" data-view="Notes">Notes</a> -->

                                    </div>
                                    <div id="tocView" class="view">
                                    </div>
                                    <div id="searchView" class="view">
                                        <ul id="searchResults"></ul>
                                    </div>
                                    <div id="bookmarksView" class="view">
                                        <ul id="bookmarks"></ul>
                                    </div>
                                    <div id="notesView" class="view">
                                        <div id="new-note">
                                            <textarea id="note-text"></textarea>
                                            <button id="note-anchor">Anchor</button>
                                        </div>
                                        <ol id="notes"></ol>
                                    </div>
                                </div>

                                <div id="main">
                                    <div id="titlebar">
                                        <div id="opener">
                                            <a id="slider" class="fa fa-address-card-o">Menu</a>
                                        </div>
                                        <div id="metainfo">
                                            <span id="book-title"></span>
                                            <span id="title-seperator">&nbsp;&nbsp;–&nbsp;&nbsp;</span>
                                            <span id="chapter-title"></span>
                                        </div>
                                        <div id="title-controls">
                                            
                                            <a id="bookmark" class="fa fa-bookmark">Bookmark</a>
                                            <a id="setting" class="fa fa-wrench">Settings</a>
                                            <a id="fullscreen" class="fa fa-arrows-alt">Fullscreen</a>
                                        </div>
                                    </div>

                                    <div id="divider"></div>
                                    <div id="prev" class="arrow">‹</div>
                                    <div id="viewer"></div>
                                    <div id="next" class="arrow">›</div>

                                    <div id="loader"><img src="img/loader.gif"></div>
                                </div>
                                <div class="modal md-effect-1" id="settings-modal">
                                    <div class="md-content">
                                        <h3>Settings</h3>
                                        <div>
                                            <p>
                                                <input type="checkbox" id="sidebarReflow" name="sidebarReflow">Reflow
                                                text when sidebars are open.
                                            </p>
                                        </div>
                                        <div class="closer icon-cancel-circled"></div>
                                    </div>
                                </div>




                                <!-- <object data="<?php
                                echo base_url('decrypt/'.$fileName); 
                                ?>" 
                                type="application/pdf" width="100%" height="700px">
                                    <p>Alternative text - include a link <a href="myfile.pdf">to the PDF!</a></p>
                                </object> -->
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
                                        <form method="POST"
                                            action="<?php echo base_url('controller_buku/ulas/'.$cek['b_idbuku']) ?>">

                                            <div class="form-group label-floating">
                                                <label class="control-label">Beri Ulasan Buku</label>
                                                <textarea name="vulasan" rows="7"
                                                    class="form-control"> <?php echo $ulasan['r_ulasan']; ?> </textarea>
                                                <span class="text-danger"><?php echo form_error('vulasan'); ?></span>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Beri Rating</label>
                                                <input class="rating" type="hidden" value="5">
                                                <select class="form-control" name="vrating"
                                                    value="<?php echo $ulasan['r_ulasan']; ?>" required>
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

<script type="text/javascript">
$(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    });
    
    //Disable part of page
    $("#id").on("contextmenu",function(e){
        return false;
    });
});
</script>

<script type="text/javascript">
$(document).ready(function () {
    //Disable full page
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
    
    //Disable part of page
    $('#id').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});
</script>

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
        $(location).attr('href', '<?php echo base_url()?>controller_buku/kembalikan/' + id);
    }, function(dismiss) {
        // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
        if (dismiss === 'cancel') {}
    });
}
</script>

<script>
    "use strict";

    document.onreadystatechange = function () {
        if (document.readyState == "complete") {
        window.reader = ePubReader("https://s3.amazonaws.com/moby-dick/", {
            restore: true
            });
        }
    };
</script>



