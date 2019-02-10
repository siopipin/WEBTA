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
        redirect('controller_laporanpengguna/laporan/', 'refresh');
    }

    public function laporanMember()
    {

        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'controller_laporan/cetak?filter=1&tahun=' . $tgl;
                $transaksi = $this->model_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'controller_laporan/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun ' . $tahun;
                $url_cetak = 'controller_laporan/cetak?filter=3&tahun=' . $tahun;
                $transaksi = $this->model_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'controller_laporan/cetak';
            $transaksi = $this->model_laporan->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['transaksi'] = $transaksi;

        $data['optiontahun'] = $this->model_laporan->optionTahun()->result();
        $data['view'] = ('admin/dashboard/view_laporanpengguna.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                
                $tgl = $_GET['tahun'];

                $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
                $transaksi = $this->model_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $transaksi = $this->model_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun ' . $tahun;
                $transaksi = $this->model_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->model_laporan->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        ob_start();
        $this->load->view('admin/dashboard/view_printpengguna', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once './assets/html2pdf/html2pdf.class.php';
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Pengguna.pdf', 'D');
      
    }

}

/* End of file  controller_pengguna.php */
