<!-- INI KONTENT -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_page/databuku/') ?>">Buku</a>
                    <li class="active">Tambah Buku</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="rose">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Tambah Buku:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#profile" data-toggle="tab">
                                            <i class="material-icons">library_books</i> Data Buku
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <!-- isi untuk tambah buku -->
                                <div class="col-lg-12"><br>
                                    <ol class="breadcrumb">
                                        <li>
                                            <a href="<?php echo site_url('controller_page/databuku/') ?>">Buku</a>
                                        <li class="active">Tambah Buku</li>
                                        </li>
                                    </ol>
                                    <?php echo $this->session->flashdata('msg');
                                    //include "daftar_klasifikasi.php";
                                    ?>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">

                                        <?php echo form_open_multipart('controller_buku/tambah', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

                                        <div class="card-header card-header-text" data-background-color="rose">
                                            <h4 class="card-title">Tambah Buku</h4>
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
                                                <label class="col-sm-2 label-on-left">Judul Buku</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" placeholder="Judul Buku"
                                                            name="vjudul">
                                                        <span
                                                            class="text-danger"><?php echo form_error('vjudul'); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <textarea name="vdeskripsi" id="vdeskripsi"
                                                            placeholder="Deskripsi Buku" class="form-control"
                                                            rows="7"></textarea>
                                                        <span
                                                            class="text-danger"><?php echo form_error('vdeskripsi'); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">ISBN</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" placeholder="ISBN"
                                                            name="visbn">
                                                        <span
                                                            class="text-danger"><?php echo form_error('visbn'); ?></span>
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
                                                        <select class="form-control" id="sklasifikasi"
                                                            name="vklasifikasitmp" data-placeholder="Klasifikasi"
                                                            onchange="demo.showSwal('second-clasification')"
                                                            autocomplete="off" required>
                                                            <option value="000">Publikasi Umum, Informasi Umum dan
                                                                Komputer</option>
                                                            <option value="100">Filsafat dan psikologi</option>
                                                            <option value="200">Agama</option>
                                                            <option value="300">Ilmu Sosial, Sosiologi & Antropologi
                                                            </option>
                                                            <option value="400">Bahasa</option>
                                                            <option value="500">Sains</option>
                                                            <option value="600">Teknologi</option>
                                                            <option value="700">Seni</option>
                                                            <option value="800">Sastra, retorika & kritik</option>
                                                            <option value="900">Sejarah</option>

                                                        </select>
                                                        <span
                                                            class="text-danger"><?php echo form_error('vklasifikasitmp'); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                            document.getElementById("sklasifikasi").addEventListener("change",
                                                generateData);

                                            function generateData() {
                                                var klasifikasi = [];
                                                klasifikasi[0] = "Publikasi Umum, Informasi Umum dan Komputer";
                                                klasifikasi[1] = "Bibiliografi";
                                                klasifikasi[2] = "Perpustakaan dan Informasi";
                                                klasifikasi[3] = "Ensiklopedia dan Buku yang memuat fakta-fakta";
                                                klasifikasi[4] = "Tidak ada Klasifikasi (sebelumnya untuk Biografi)";
                                                klasifikasi[5] = "Majalah dan Jurnal";
                                                klasifikasi[6] = "Asosiasi, Organisasi dan Museum";
                                                klasifikasi[7] = "Media massa, junalisme dan publikasi";
                                                klasifikasi[8] = "Kutipan";
                                                klasifikasi[9] = "Manuskrip dan buku langka";

                                                klasifikasi[10] = "Filsafat dan psikologi";
                                                klasifikasi[11] = "Metafisika";
                                                klasifikasi[12] = "Epistimologi";
                                                klasifikasi[13] = "Parapsikologi dan Okultisme";
                                                klasifikasi[14] = "Pemikiran Filosofis";
                                                klasifikasi[15] = "Psikologi";
                                                klasifikasi[16] = "Filosofis Logis";
                                                klasifikasi[17] = "Etik";
                                                klasifikasi[18] =
                                                    "Filosofi kuno, zaman pertengahan, dan filosofi ketimuran";
                                                klasifikasi[19] = "Filosofi barat modern";

                                                klasifikasi[20] = "Agama";
                                                klasifikasi[21] = "Filsafat & teori agama";
                                                klasifikasi[22] = "Alkitab";
                                                klasifikasi[23] = "Kristen & teologi Kristen";
                                                klasifikasi[24] = "Christian praktek & ketaatan";
                                                klasifikasi[25] = "praktek pastoral Kristen & perintah agama";
                                                klasifikasi[26] = "Christian organisasi kerja, sosial & ibadah";
                                                klasifikasi[27] = "Sejarah Kekristenan";
                                                klasifikasi[28] = "Kristen denominasi";
                                                klasifikasi[29] = "lain agama";

                                                klasifikasi[30] = "Ilmu Sosial, Sosiologi & Antropologi";
                                                klasifikasi[31] = "Statistik";
                                                klasifikasi[32] = "Ilmu politik";
                                                klasifikasi[33] = "Ekonomi";
                                                klasifikasi[34] = "Hukum";
                                                klasifikasi[35] = "Administrasi publik & ilmu militer";
                                                klasifikasi[36] = "sosial masalah & layanan sosial";
                                                klasifikasi[37] = "Pendidikan";
                                                klasifikasi[38] = "Commerce, komunikasi & transportasi";
                                                klasifikasi[39] = "Bea Cukai, etiket & cerita rakyat";

                                                klasifikasi[40] = "Bahasa";
                                                klasifikasi[41] = "Linguistik";
                                                klasifikasi[42] = "Bahasa Inggris & bahasa Inggris Kuno";
                                                klasifikasi[43] = "Jerman & terkait bahasa";
                                                klasifikasi[44] = "French & terkait bahasa";
                                                klasifikasi[45] = "Italia, Rumania & terkait bahasa";
                                                klasifikasi[46] = "Spanyol & Portugis bahasa";
                                                klasifikasi[47] = "Latin & Italic bahasa";
                                                klasifikasi[48] = "Yunani Klasik & modern bahasa";
                                                klasifikasi[49] = "Bahasa lainnya";

                                                klasifikasi[50] = "Sains";
                                                klasifikasi[51] = "Matematika";
                                                klasifikasi[52] = "Astronomi";
                                                klasifikasi[53] = "Fisika";
                                                klasifikasi[54] = "Kimia";
                                                klasifikasi[55] = "Ilmu Bumi & Geologi";
                                                klasifikasi[56] = "Fosil & kehidupan prasejarah";
                                                klasifikasi[57] = "Hidup ilmu; biologi";
                                                klasifikasi[58] = "Tanaman (Botani)";
                                                klasifikasi[59] = "Hewan (Zoologi)";

                                                klasifikasi[60] = "Teknologi";
                                                klasifikasi[61] = "Kedokteran & Kesehatan";
                                                klasifikasi[62] = "Rekayasa";
                                                klasifikasi[63] = "Pertanian";
                                                klasifikasi[64] = "Rumah & manajemen keluarga";
                                                klasifikasi[65] = "Manajemen & public relations";
                                                klasifikasi[66] = "Teknik kimia";
                                                klasifikasi[67] = "Manufaktur";
                                                klasifikasi[68] = "Industri untuk keperluan tertentu";
                                                klasifikasi[69] = "Bangunan & konstruksi";

                                                klasifikasi[70] = "Seni";
                                                klasifikasi[71] = "Landscaping & perencanaan wilayah";
                                                klasifikasi[72] = "Arsitektur";
                                                klasifikasi[73] = "Patung, keramik & logam";
                                                klasifikasi[74] = "Menggambar & seni dekoratif";
                                                klasifikasi[75] = "Lukisan";
                                                klasifikasi[76] = "Graphic seni";
                                                klasifikasi[77] = "Fotografi & seni komputer";
                                                klasifikasi[78] = "Musik";
                                                klasifikasi[79] = "Olahraga, permainan & hiburan";

                                                klasifikasi[80] = "Sastra, retorika & kritik";
                                                klasifikasi[81] = "sastra Amerika dalam bahasa Inggris";
                                                klasifikasi[82] = "Bahasa Inggris literatur Inggris & Old";
                                                klasifikasi[83] = "Jerman & terkait literatur";
                                                klasifikasi[84] = "French & terkait literatur";
                                                klasifikasi[85] = "Italia, Rumania & terkait literatur";
                                                klasifikasi[86] = "Spanyol & Portugis literatur";
                                                klasifikasi[87] = "Latin & Italic literatur";
                                                klasifikasi[88] = "Yunani Klasik & modern literatur";
                                                klasifikasi[89] = "lainnya literatur";

                                                klasifikasi[90] = "Sejarah";
                                                klasifikasi[91] = "Geografi & travel";
                                                klasifikasi[92] = "Biografi & silsilah";
                                                klasifikasi[93] = "Sejarah dunia kuno";
                                                klasifikasi[94] = "Sejarah Eropa";
                                                klasifikasi[95] = "Sejarah Asia";
                                                klasifikasi[96] = "Sejarah Afrika";
                                                klasifikasi[97] = "Sejarah Amerika Utara";
                                                klasifikasi[98] = "Sejarah Amerika Selatan";
                                                klasifikasi[99] = "Sejarah daerah lain";



                                                var klas = document.getElementById("sklasifikasi");
                                                var klas2 = document.getElementById("sklasifikasi2");
                                                klas2.innerHTML = '';

                                                var kode = klas.options[klas.selectedIndex].value;
                                                var kodeI = parseInt(kode, 10) / 10;
                                                for (var i = 1; i < 10; i++) {
                                                    var option = document.createElement("option");
                                                    option.text = klasifikasi[kodeI + i];
                                                    option.value = klasifikasi[kodeI + i];
                                                    klas2.add(option, klas2[i]);
                                                }


                                            }
                                            </script>

                                            <div class="row" id="dklasifikasi2" style="visibility: hidden">
                                                <label class="col-sm-2 label-on-left"></label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <!--
                                        <input type="text" class="form-control" placeholder="Klasifikasi"
                                            name="vklasifikasi">
                                            -->
                                                        <select class="form-control" id="sklasifikasi2"
                                                            name="vklasifikasi" data-placeholder="Klasifikasi"
                                                            autocomplete="off" required>
                                                            <option name="vklasifikasi"></option>
                                                        </select>
                                                        <span
                                                            class="text-danger"><?php echo form_error('vklasifikasi'); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Penulis</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" placeholder="Pengarang"
                                                            name="vpengarang">
                                                        <span
                                                            class="text-danger"><?php echo form_error('vpengarang'); ?></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Penerbit</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" placeholder="Penerbit"
                                                            name="vpenerbit">
                                                        <span
                                                            class="text-danger"><?php echo form_error('vpenerbit'); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Tahun Terbit</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <input type="date" class="form-control" name="vtahunterbit">
                                                        <span
                                                            class="text-danger"><?php echo form_error('vtahunterbit'); ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Teks Bahasa</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <select class="form-control" name="vbahasa"
                                                            value="Bahasa Indonesia" data-placeholder="Klasifikasi"
                                                            required>
                                                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                                                        </select>
                                                        <span
                                                            class="text-danger"><?php echo form_error('vbahasa'); ?></span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Cover Buku</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"></label>
                                                        <div>
                                                            <span class="btn btn-rose btn-round btn-file">
                                                                Pilih Sampul
                                                                <input type="file" name="sampul" />
                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-footer text-right">
                                                <button type="submit" value="upload"
                                                    class="btn btn-rose btn-fill">Tambah</button>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
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

<!-- Update -->