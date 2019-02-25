<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controller_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_laporan');
        $this->load->model('model_buku');
        $this->load->model('model_landing');
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != true) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        redirect('controller_laporan/laporan/', 'refresh');
    }

    public function laporanMember()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Pengguna Tanggal' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'controller_laporan/cetak?filter=1&tahun=' . $tgl;
                $transaksi = $this->model_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengguna Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'controller_laporan/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengguna Tahun ' . $tahun;
                $url_cetak = 'controller_laporan/cetak?filter=3&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pengguna';
            $url_cetak = 'controller_laporan/cetak';
            $transaksi = $this->model_laporan->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;

        

        $data['optiontahun'] = $this->model_laporan->optionTahun()->result();
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        $data['view'] = ('admin/dashboard/laporan/view_laporanpengguna.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)

                $tgl = $_GET['tahun'];

                $ket = 'Data Pengguna Tanggal' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->model_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengguna Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->model_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengguna Tahun ' . $tahun;
                $transaksi = $this->model_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->model_laporan->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        ob_start();
        $this->load->view('admin/dashboard/laporan/view_printpengguna', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once './assets/html2pdf/html2pdf.class.php';
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Pengguna.pdf', 'D');

    }

    //laporan Pinjam
    public function laporanPinjam()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Terpinjam Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'controller_laporan/cetakPinjam?filter=1&tahun=' . $tgl;
                $transaksi = $this->model_laporan->view_by_datepinjam($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Terpinjam Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'controller_laporan/cetakPinjam?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthpinjam($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Terpinjam Tahun ' . $tahun;
                $url_cetak = 'controller_laporan/cetakPinjam?filter=3&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearpinjam($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Buku Terpinjam';
            $url_cetak = 'controller_laporan/cetakPinjam';
            $transaksi = $this->model_laporan->view_allpinjam(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();

        $data['optiontahunpinjam'] = $this->model_laporan->optionTahunPinjam()->result();
        $data['view'] = ('admin/dashboard/laporan/view_laporanpinjam.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function cetakPinjam()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)

                $tgl = $_GET['tahun'];

                $ket = 'Data Terpinjam Tanggal' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->model_laporan->view_by_datepinjam($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Terpinjam Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthpinjam($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Terpinjam Tahun ' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearpinjam($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Buku Terpinjam';
            $transaksi = $this->model_laporan->view_allpinjam(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        ob_start();
        $this->load->view('admin/dashboard/laporan/view_printpinjam', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once './assets/html2pdf/html2pdf.class.php';
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Peminjaman.pdf', 'D');

    }

    //laporan Pinjam
    public function laporanBuku()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Buku Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'controller_laporan/cetakBuku?filter=1&tahun=' . $tgl;
                $transaksi = $this->model_laporan->view_by_datebuku($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Buku Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'controller_laporan/cetakBuku?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthbuku($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Buku Tahun ' . $tahun;
                $url_cetak = 'controller_laporan/cetakBuku?filter=3&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearbuku($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Buku';
            $url_cetak = 'controller_laporan/cetakBuku';
            $transaksi = $this->model_laporan->view_allbuku(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        $data['optiontahunbuku'] = $this->model_laporan->optionTahunBuku()->result();
        $data['view'] = ('admin/dashboard/laporan/view_laporanbuku.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function cetakBuku()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)

                $tgl = $_GET['tahun'];

                $ket = 'Data Buku Tanggal' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->model_laporan->view_by_datebuku($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Buku Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthbuku($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Buku Tahun ' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearbuku($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Buku';
            $transaksi = $this->model_laporan->view_allbuku(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        ob_start();
        $this->load->view('admin/dashboard/laporan/view_printbuku', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once './assets/html2pdf/html2pdf.class.php';
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Buku.pdf', 'D');

    }

    // Laporan edit data
    public function laporanRating()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $member = $_GET['member'];

                $ket = 'Data Rating oleh pengguna' . $member;
                $url_cetak = 'controller_laporan/cetakrating?filter=1&member=' . $member;
                $transaksi = $this->model_laporan->view_by_name($member); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else { // Jika filter nya 2 (per bulan)
                $buku = $_GET['buku'];
                $ket = 'Data Rating oleh Judul Buku ' . $buku;
                $url_cetak = 'controller_laporan/cetakrating?filter=2&buku=' . $buku;
                $transaksi = $this->model_laporan->view_by_judul($buku); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Rating';
            $url_cetak = 'controller_laporan/cetakrating';
            $transaksi = $this->model_laporan->view_allrating(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;

        $data['optionnama'] = $this->model_laporan->optionNama()->result();
        $data['optionjudul'] = $this->model_laporan->optionJudul()->result();


        //Rekomendasi
       

        //mfcm bawaan heru

        if (!(isset($_SESSION['ses_id']))) {
            $data['mfcm'] = $this->model_buku->getMfcm(0);
        } else {
            //$idUser = $_SESSION['ses_id']; 
            $idUser = 15 // debuging use heru; 
            echo "<script type='text/javascript'> alert('oke bos')</script>";
            $mysqli = new mysqli("localhost", "root", "", "db_perpus");
            $query = $mysqli->query("SELECT * FROM tbl_rating where r_iduser = " . $idUser);
            $jlh = mysqli_num_rows($query);
            //echo "<script type='text/javascript'> alert('Jumlahnya : ".$jlh." | ".$idUser."')</script>";
            if ($jlh == 0) {
                $data['mfcm'] = $this->model_buku->getMfcm(0);
            } else {
                $data['mfcm'] = $this->model_buku->getMfcm($idUser);
            }
        }
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        $data['view'] = ('admin/dashboard/laporan/view_laporanrating.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function cetakrating()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)

                $member = $_GET['member'];

                $ket = 'Data Rating oleh pengguna' . $member;
                $transaksi = $this->model_laporan->view_by_name($member); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else { // Jika filter nya 2 (per bulan)
                $buku = $_GET['buku'];
                $ket = 'Data Rating oleh Judul Buku ' . $buku;
                $transaksi = $this->model_laporan->view_by_judul($buku); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Rating';
            $transaksi = $this->model_laporan->view_allrating(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        ob_start();
        $this->load->view('admin/dashboard/laporan/view_printrating', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once './assets/html2pdf/html2pdf.class.php';
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Rating.pdf', 'D');

    }

    public function updaterating()
    {

        $idrating = $this->uri->segment(3);

        if (!is_null($this->input->post('vrating'))) {
            // code for button 1
            $rating = $this->input->post('vrating');
            $data = array(
                'r_rating' => $rating,
            );
            $this->model_laporan->updaterating($idrating, $data);

            echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Rating Berhasil diupdate!!</div>');
            $data['pesan'] = $this->model_landing->pesan()->result();
            $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
            redirect('controller_laporan/laporanRating/' . $idrating, 'refresh');
        }
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Rating Gagal disimpan!!</div>');
        redirect('controller_laporan/laporanRating/' . $idrating, 'refresh');

    }

}

/* End of file  controller_pengguna.php */
