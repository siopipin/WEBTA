<?php
class Controller_page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        $data['view'] = 'admin/dashboard/view_dashboard';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function tambahbuku()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['optjudul'] = $this->model_buku->getjudul()->result();
            $data['pesan'] = $this->model_landing->pesan()->result();
            $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
            $data['view'] = ('admin/dashboard/_partials/part_tambahbuku.php');
            $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function databuku()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['tbl_buku'] = $this->model_buku->getAll();
            $data['pesan'] = $this->model_landing->pesan()->result();
            $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
            $data['view'] = ('admin/dashboard/_partials/part_databuku.php');
            $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function editbuku()
    {
        if ($this->session->userdata('akses') == '1') {
            $idbuku = $this->uri->segment(3);
            $data['pesan'] = $this->model_landing->pesan()->result();
            $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
            $data['edit'] = $this->model_buku->cekBuku($idbuku)->row_array();
            $data['view'] = ('admin/dashboard/_partials/part_editbuku.php');
            $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function satu()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '0' || $this->session->userdata('akses') == '3') {
            $data['pesan'] = $this->model_landing->pesan()->result();
            $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
            $data['view'] = ('admin/dashboard/_partials/part_satu.php');
            $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }
}
