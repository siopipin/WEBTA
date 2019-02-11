<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class controller_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_laporan');
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

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;

        $data['optiontahun'] = $this->model_laporan->optionTahun()->result();
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

                $ket = 'Data Pengguna Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'controller_laporan/cetakPinjam?filter=1&tahun=' . $tgl;
                $transaksi = $this->model_laporan->view_by_datepinjam($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengguna Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'controller_laporan/cetakPinjam?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthpinjam($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengguna Tahun ' . $tahun;
                $url_cetak = 'controller_laporan/cetakPinjam?filter=3&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearpinjam($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pengguna';
            $url_cetak = 'controller_laporan/cetakPinjam';
            $transaksi = $this->model_laporan->view_allpinjam(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;

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

                $ket = 'Data Pengguna Tanggal' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->model_laporan->view_by_datepinjam($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengguna Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthpinjam($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengguna Tahun ' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearpinjam($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
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

                $ket = 'Data Pengguna Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'controller_laporan/cetakBuku?filter=1&tahun=' . $tgl;
                $transaksi = $this->model_laporan->view_by_datebuku($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengguna Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'controller_laporan/cetakBuku?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthbuku($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengguna Tahun ' . $tahun;
                $url_cetak = 'controller_laporan/cetakBuku?filter=3&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearbuku($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pengguna';
            $url_cetak = 'controller_laporan/cetakBuku';
            $transaksi = $this->model_laporan->view_allbuku(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;

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

                $ket = 'Data Pengguna Tanggal' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->model_laporan->view_by_datebuku($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Pengguna Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->model_laporan->view_by_monthbuku($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pengguna Tahun ' . $tahun;
                $transaksi = $this->model_laporan->view_by_yearbuku($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
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
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Rating';
            $url_cetak = 'controller_laporan/cetak';
            //$transaksi = $this->model_laporan->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
            $queryR = $mysqli->query("SELECT * FROM tbl_rating");
            $rating = array();
            while ($data = $queryR->fetch_assoc()) {
                $id = $data['r_id'];
                $iduser = $data['r_iduser'];
                $idbuku = $data['r_idbuku'];
                $nilai = $data['r_rating'];
                $tgl = $data['r_tanggalrating'];
                $ratingtmp = array('r_id'=>$id,'r_iduser'=>$iduser, 'r_idbuku'=>$idbuku, 'r_rating'=>$nilai, 'r_tanggalrating'=>$tgl);
                array_push($rating,$ratingtmp);
            }
        }
        $semuauser = array();
        
        $query = $mysqli->query("SELECT * FROM tbl_pengguna ORDER BY p_id ASC");

        while ($data = $query->fetch_assoc()) {
            $idMember = $data['p_id'];
            $namaMember = $data['p_nama'];
            $usertmp = array('id'=>$idMember, 'nama'=>$namaMember);
            array_push($semuauser,$usertmp);
        }
        
        $data['user'] = $semuauser;
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['rating'] = $rating;
        $data['view'] = ('admin/dashboard/laporan/view_laporanrating.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    function simpan(){
        
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
        $sid = $this->input->POST('vidrating');
        $snilai = $this->input->POST('vnilai');
        echo "<script type='text/javascript'>alert('asu".$sid."|".$snilai."');</script>";
        $query = $mysqli->query("UPDATE tbl_rating SET r_rating=".$snilai." WHERE r_id =".$sid);
        redirect('controller_laporan/laporanRating/', 'refresh');
    }

}

/* End of file  controller_pengguna.php */
