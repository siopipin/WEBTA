<?php 
// DASHBOARD CLASS
$dash = $this->uri->segment(1) == 'controller_dashboard' ? 'active' :'';




// SEGMENT BUKU
if($this->uri->segment(2) == 'tambahbuku'){
    $tambahbukuin = 'in';
}
elseif($this->uri->segment(2) == 'databuku'){
    $tambahbukuin = 'in';
}
elseif($this->uri->segment(2) == 'tambah'){
    $tambahbukuin = 'in';
}
elseif($this->uri->segment(2) == 'editbuku'){
    $tambahbukuin = 'in';
}
elseif($this->uri->segment(2) == 'update'){
    $tambahbukuin = 'in';
}
elseif($this->uri->segment(2) == 'file'){
    $tambahbukuin = 'in';
}
elseif($this->uri->segment(2) == 'filedek'){
    $tambahbukuin = 'in';
}
else{
    $tambahbukuin = '';
}


// TAMBAH BUKU CLASS
if($this->uri->segment(2) == 'tambahbuku'){
    $tambahbuku = 'active';
}
elseif($this->uri->segment(2) == 'tambah'){
    $tambahbuku = 'active';
}
else{
    $tambahbuku = '';
}

if($this->uri->segment(2) == 'file'){
    $file = 'active';
}
else{
    $file = '';
}

if($this->uri->segment(2) == 'filedek'){
    $dekripsi = 'active';
}
else{
    $dekripsi = '';
}

// DATA BUKU CLASS
if($this->uri->segment(2) == 'databuku'){
    $databuku = 'active';
}
elseif($this->uri->segment(2) == 'editbuku'){
    $databuku = 'active';
}
elseif($this->uri->segment(2) == 'update'){
    $databuku = 'active';
}
else{
    $databuku = '';
}


// Buku Terpinjam
if($this->uri->segment(2) == 'bukuTerpinjam'){
    $bukupinjam = 'active';
    $dash = '';
}
elseif($this->uri->segment(2) == 'baca'){
    $bukupinjam = 'active';
    $dash = '';
}
else{
    $bukupinjam = '';
}

if($this->uri->segment(2) == 'bukuTerpinjam'){
    $bukupinjamin = 'in';
}
elseif($this->uri->segment(2) == 'baca'){
    $bukupinjamin = 'in';
}
elseif($this->uri->segment(2) == 'riwayat'){
    $bukupinjamin = 'in';
}
else{
    $bukupinjamin = '';
}

if($this->uri->segment(2) == 'riwayat'){
    $riwayat = 'in';
}
else{
    $riwayat = '';
}

if($this->uri->segment(2) == 'riwayat'){
    $riwayat = 'active';
    $dash = '';
}
else{
    $riwayat = '';
}

//Edit profile

if($this->uri->segment(2) == 'editprofile'){
    $profile = 'in';
}
elseif($this->uri->segment(2) == 'identifikasi'){
    $profile = 'in';
}
else{
    $profile = '';
}

if($this->uri->segment(2) == 'editprofile'){
    $profil = 'active';
    $dash = '';
}
else{
    $profil = '';
}


//Edit Identifikasi


if($this->uri->segment(2) == 'identifikasi'){
    $iden = 'active';
    $dash = '';
}
else{
    $iden = '';
}


//Kelola Pengguna

if($this->uri->segment(2) == 'daftarPengguna'){
    $kelolain = 'in';
}
elseif($this->uri->segment(2) == 'verifikasiPengguna'){
    $kelolain = 'in';
}
else{
    $kelolain = '';
}

if($this->uri->segment(2) == 'daftarPengguna'){
    $kelolaaktif = 'active';
    $dash = '';
}
else{
    $kelolaaktif = '';
}

if($this->uri->segment(2) == 'verifikasiPengguna'){
    $verifikasipengguna = 'active';
    $dash = '';
}
else{
    $verifikasipengguna = '';
}


// Laporan
if($this->uri->segment(2) == 'laporanMember'){
    $laporanin = 'in';
}
elseif($this->uri->segment(2) == 'laporanPinjam'){
    $laporanin = 'in';
}
elseif($this->uri->segment(2) == 'laporanBuku'){
    $laporanin = 'in';
}
elseif($this->uri->segment(2) == 'laporanRating'){
    $laporanin = 'in';
}
else{
    $laporanin = '';
}

if($this->uri->segment(2) == 'laporanMember'){
    $penggunaaktif = 'active';
    $dash = '';
}
else{
    $penggunaaktif = '';
}

if($this->uri->segment(2) == 'laporanPinjam'){
    $laporanpinjamaktif = 'active';
    $dash = '';
}
else{
    $laporanpinjamaktif = '';
}

if($this->uri->segment(2) == 'laporanBuku'){
    $laporanbukuaktif = 'active';
    $dash = '';
}
else{
    $laporanbukuaktif = '';
}

if($this->uri->segment(2) == 'laporanRating'){
    $laporanratingaktif = 'active';
    $dash = '';
}
else{
    $laporanratingaktif = '';
}

if($this->uri->segment(2) == 'infovisitor'){
    $ip = 'active';
    $dash = '';
}
else{
    $ip = '';
}

?>









<!-- KONTEN SIDEBAR -->

<div class="sidebar" data-active-color="orange" data-background-color="white"
    data-image="<?php echo base_url(); ?>assets/img/sidebar-2.jpg">

    <div class="logo">
        <a href="#" class="simple-text">
            EPerpus
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="#" class="simple-text">
            PD
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
            <?php if($this->session->userdata('akses') == '3') { ?>
                <?php if( $_SESSION['ses_foto'] != "") { ?>
                    <img src="<?php echo base_url(); ?>assets/img/profil/<?php echo $_SESSION['ses_foto']; ?>">
                <?php }else{ ?>
                    <img src="../assets/img/faces/default.png" />
                <?php } ?>

                
            <?php }else{ ?>
                <img src="../assets/img/faces/default.png" />
            <?php } ?>
            
               
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <?php echo $this->session->userdata('ses_nama'); ?>
                    <b class="caret"></b>
                </a>
                <div class="collapse <?php echo $profile; ?>" id="collapseExample">
                    <ul class="nav">
                        
                    <?php if($this->session->userdata('akses') == '3') { ?>
                        <li  class="<?php echo $profil; ?>">
                            <a href="<?php echo base_url('controller_profile/editprofile/') ?>">Profil</a>
                        </li>
                        <li class="<?php echo $iden; ?>">
                            <a href="<?php echo base_url('controller_profile/identifikasi/') ?>">Identifikasi</a>
                        </li>
                    <?php }else{ ?>
                        
                    <?php } ?>
                        
                        
                        <li>
                            <a href="<?php echo base_url() . 'controller_auth/logout' ?>">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="<?php echo $dash; ?>">
                <a href="<?php echo base_url() . 'controller_dashboard/index' ?>">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>



            <!-- AKSES ADMIN -->


            <?php if ($this->session->userdata('akses') == '1') : ?>
            <li class="<?php echo $tambahbuku; ?>">
                <a data-toggle="collapse" href="#pagesExamples" aria-expanded="true">
                    <i class="material-icons">book</i>
                    <p>Kelola Buku Digital
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo $tambahbukuin; ?>" id="pagesExamples">
                    <ul class="nav">
                        <li class="<?php echo $databuku; ?>">
                            <a href="<?php echo base_url() . 'controller_page/databuku' ?>">
                                <i class="material-icons">list</i>
                                Daftar Buku
                            </a>
                        </li>
                        <li class="<?php echo $tambahbuku; ?>">
                            <a href="<?php echo base_url() . 'controller_page/tambahbuku' ?>">
                                <i class="material-icons">library_add</i>
                                Tambah Buku
                            </a>
                        </li>
                        <li class="<?php echo $file; ?>">
                            <a href="<?php echo base_url() . 'controller_enkripsi/index' ?>">
                                <i class="material-icons">lock</i>
                                Enkripsi File
                            </a>
                        </li>
                        <li class="<?php echo $dekripsi; ?>">
                            <a href="<?php echo base_url() . 'controller_dekripsi/index' ?>">
                                <i class="material-icons">lock_open</i>
                                Dekripsi File
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="<?php echo $kelolaaktif; ?>">
                <a data-toggle="collapse" href="#kelolapengguna" aria-expanded="true">
                    <i class="material-icons">perm_identity</i>
                    <p>Kelola Pengguna
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo $kelolain; ?>" id="kelolapengguna">
                    <ul class="nav">
                        <li class="<?php echo $kelolaaktif; ?>">
                            <a href="<?php echo base_url() . 'controller_kelolapengguna/daftarPengguna' ?>">
                                <i class="material-icons">list</i>
                                Daftar Pengguna
                            </a>
                        </li>
                        <li class="<?php echo $verifikasipengguna; ?>">
                            <a href="<?php echo base_url() . 'controller_kelolapengguna/verifikasiPengguna' ?>">
                                <i class="material-icons">library_add</i>
                                Verifikasi
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="<?php echo $kelolaaktif; ?>">
                <a data-toggle="collapse" href="#kelolalaporan" aria-expanded="true">
                    <i class="material-icons">receipt</i>
                    <p>Kelola Laporan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo $laporanin; ?>" id="kelolalaporan">
                    <ul class="nav">
                        <li class="<?php echo $penggunaaktif; ?>">
                            <a href="<?php echo base_url() . 'controller_laporan/laporanMember' ?>">
                                <i class="material-icons">record_voice_over</i>
                                Laporan Member
                            </a>
                        </li>
                        <li class="<?php echo $laporanpinjamaktif; ?>">
                            <a href="<?php echo base_url() . 'controller_laporan/laporanPinjam' ?>">
                                <i class="material-icons">library_add</i>
                                Laporan Peminjaman
                            </a>
                        </li>

                        <li class="<?php echo $laporanbukuaktif; ?>">
                            <a href="<?php echo base_url() . 'controller_laporan/laporanBuku' ?>">
                                <i class="material-icons">book</i>
                                Laporan Buku
                            </a>
                        </li>

                        <li class="<?php echo $laporanratingaktif; ?>">
                            <a href="<?php echo base_url() . 'controller_laporan/laporanRating' ?>">
                                <i class="material-icons">record_voice_over</i>
                                Laporan Rating
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="<?php echo $ip; ?>">
                <a href="<?php echo base_url() . 'controller_infovisitor/infoVisitor' ?>">
                    <i class="material-icons">flip</i>
                    <p>IP Asset Manejemen</p>
                </a>
            </li>




            <!-- Menu Member -->

            <?php if($this->session->userdata('akses') == '3') { ?>
                <li class="<?php echo $bukupinjam; ?>">
                <a data-toggle="collapse" href="#bukuTerpinjam" aria-expanded="true">
                    <i class="material-icons">book</i>
                    <p>Rak Buku
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo $bukupinjamin; ?>" id="bukuTerpinjam">
                    <ul class="nav">
                        <li class="<?php echo $bukupinjam; ?>">
                            <a href="<?php echo base_url() . 'controller_buku/bukuTerpinjam' ?>">
                                <i class="material-icons">list</i>
                                Buku Terpinjam
                            </a>
                        </li>
                        <li class="<?php echo $riwayat; ?>">
                            <a href="<?php echo base_url() . 'controller_riwayat/riwayat' ?>">
                                <i class="material-icons">library_add</i>
                                Riwayat
                            </a>
                        </li>
                    </ul>
                </div>

                
            </li>

            

            <?php }else{ ?>
                
            <?php } ?>

            




            <!-- AKSES DEMO -->
            <?php elseif ($this->session->userdata('akses') == '0') : ?>
            <li>
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">image</i>
                    <p>Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li>
                            <a href="pages/pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="pages/timeline.html">Timeline</a>
                        </li>
                        <li>
                            <a href="pages/login.html">Login Page</a>
                        </li>
                        <li>
                            <a href="pages/register.html">Register Page</a>
                        </li>
                        <li>
                            <a href="pages/lock.html">Lock Screen Page</a>
                        </li>
                        <li>
                            <a href="pages/user.html">User Profile</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#componentsExamples">
                    <i class="material-icons">apps</i>
                    <p>Components
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples">
                    <ul class="nav">
                        <li>
                            <a href="components/buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="components/grid.html">Grid System</a>
                        </li>
                        <li>
                            <a href="components/panels.html">Panels</a>
                        </li>
                        <li>
                            <a href="components/sweet-alert.html">Sweet Alert</a>
                        </li>
                        <li>
                            <a href="components/notifications.html">Notifications</a>
                        </li>
                        <li>
                            <a href="components/icons.html">Icons</a>
                        </li>
                        <li>
                            <a href="components/typography.html">Typography</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">content_paste</i>
                    <p>Forms
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li>
                            <a href="forms/regular.html">Regular Forms</a>
                        </li>
                        <li>
                            <a href="forms/extended.html">Extended Forms</a>
                        </li>
                        <li>
                            <a href="forms/validation.html">Validation Forms</a>
                        </li>
                        <li>
                            <a href="forms/wizard.html">Wizard</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#tablesExamples">
                    <i class="material-icons">grid_on</i>
                    <p>Tables
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li>
                            <a href="tables/regular.html">Regular Tables</a>
                        </li>
                        <li>
                            <a href="tables/extended.html">Extended Tables</a>
                        </li>
                        <li>
                            <a href="tables/datatables.net.html">DataTables.net</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#mapsExamples">
                    <i class="material-icons">place</i>
                    <p>Maps
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li>
                            <a href="maps/google.html">Google Maps</a>
                        </li>
                        <li>
                            <a href="maps/fullscreen.html">Full Screen Map</a>
                        </li>
                        <li>
                            <a href="maps/vector.html">Vector Map</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="widgets.html">
                    <i class="material-icons">widgets</i>
                    <p>Widgets</p>
                </a>
            </li>
            <li>
                <a href="charts.html">
                    <i class="material-icons">timeline</i>
                    <p>Charts</p>
                </a>
            </li>
            <li>
                <a href="calendar.html">
                    <i class="material-icons">date_range</i>
                    <p>Calendar</p>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('controller_page/satu/') ?>">Akses 0 : Demo</a>
            </li>


            <!-- Akses Pengguna / member -->
            <?php else : ?>
            <li class="<?php echo $bukupinjam; ?>">
                <a data-toggle="collapse" href="#bukuTerpinjam" aria-expanded="true">
                    <i class="material-icons">book</i>
                    <p>Rak Buku
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo $bukupinjamin; ?>" id="bukuTerpinjam">
                    <ul class="nav">
                        <li class="<?php echo $bukupinjam; ?>">
                            <a href="<?php echo base_url() . 'controller_buku/bukuTerpinjam' ?>">
                                <i class="material-icons">list</i>
                                Buku Terpinjam
                            </a>
                        </li>
                        <li class="<?php echo $riwayat; ?>">
                            <a href="<?php echo base_url() . 'controller_riwayat/riwayat' ?>">
                                <i class="material-icons">library_add</i>
                                Riwayat
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <?php endif; ?>
        </ul>
    </div>
</div>