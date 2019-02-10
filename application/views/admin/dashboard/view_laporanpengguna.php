<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_dashboard/index/') ?>">Dashboard</a>
                    <li class="active">Laporan Member</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

            <div class="col-md-12 col-xs-12 col-lg-12">
            
            </div>

            <div class="col-md-12">
                <form method="GET" action="">
                    <label for="">Filter Berdasarkan</label>
                    <select name="filter" id="filter">
                        <option value="">Pilih</option>
                        <option value="1">Berdasarkan Tanggal</option>
                        <option value="2">Berdasarkan Bulan</option>
                        <option value="3">Berdasarkan Tahun</option>
                    </select>
                    <br>
                    <br>
                    <div id="form-tanggal">
                        <label>Tanggal</label><br>
                        <input type="text" name="tanggal" />
                        <br /><br />
                    </div>
                    <div id="form-bulan">
                        <label>Bulan</label><br>
                        <select name="bulan">
                            <option value="">Pilih</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <br /><br />
                    </div>
                    <div id="form-tahun">
                        <label>Tahun</label><br>
                        <select name="tahun">
                            <option value="">Pilih</option>
                            <?php
                                foreach ($optiontahun as $row) { ?>
                                <option value="<?php echo $row->tahun ?>"><?php echo $row->tahun ?></option>
                            <?php }
                            ?>
                        </select>
                        <br /><br />
                    </div>
                    <button type="submit">Tampilkan</button>
                    <a href="<?php echo base_url('controller_laporan/laporanMember'); ?>">Reset Filter</a>
                </form>

                <hr />

                <b><?php echo $ket; ?></b><br /><br />
                <a href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br />
                <table border="1" cellpadding="8">
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Total Harga 2</th>
                    </tr>
                    <?php
                if( ! empty($transaksi)){
                $no = 1;
                foreach($transaksi as $data){
                        $tgl = date('d-m-Y', strtotime($data->p_createat));
                        
                    echo "<tr>";
                    echo "<td>".$tgl."</td>";
                    echo "<td>".$data->p_id."</td>";
                    echo "<td>".$data->p_nama."</td>";
                    echo "<td>".$data->p_email."</td>";
                    echo "<td>".$data->p_namapengguna."</td>";
                    echo "</tr>";
                    $no++;
                }
                }
                ?>

                    <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
                    <!-- Load file plugin js jquery-ui -->
                    <script>
                    $(document).ready(function() { // Ketika halaman selesai di load
                        $('.input-tanggal').datepicker({
                            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                        });
                        $('#form-tanggal, #form-bulan, #form-tahun')
                            .hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                        $('#filter').change(function() { // Ketika user memilih filter
                            if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                                $('#form-bulan, #form-tahun')
                                    .hide(); // Sembunyikan form bulan dan tahun
                                $('#form-tanggal').show(); // Tampilkan form tanggal
                            } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                            } else { // Jika filternya 3 (per tahun)
                                $('#form-tanggal, #form-bulan')
                                    .hide(); // Sembunyikan form tanggal dan bulan
                                $('#form-tahun').show(); // Tampilkan form tahun
                            }
                            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(
                                ''); // Clear data pada textbox tanggal, combobox bulan & tahun
                        })
                    })
                    </script>
                </table>
            </div>
        </div>
    </div>
</div>