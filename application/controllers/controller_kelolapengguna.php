<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class controller_kelolapengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_kelolapengguna');
        $this->load->model('model_profile');
        //validasi jika user belum login
        if ($this->session->userdata('masuk') != true) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        redirect('controller_kelolapengguna/daftarpengguna/', 'refresh');
    }

    public function daftarPengguna()
    {
        // $data['totalpinjam'] = $this->model_kelolapengguna->totalTransaksi()->row_array();
        $data['pengguna'] = $this->model_kelolapengguna->getAll();
        // $data['riwayat'] = $this->model_buku->riwayat($idmember)->result();
        $data['view'] = ('admin/dashboard/view_daftarpengguna.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function hapusPengguna()
    {

        $id = $this->uri->segment(3);
        $this->model_kelolapengguna->deletePengguna($id);
        $url = site_url('controller_kelolapengguna/daftarPengguna');
        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Pengguna Berhasil dihapus!!</div>');

        redirect($url);

    }

    public function verifikasiPengguna()
    {
        // $data['totalpinjam'] = $this->model_kelolapengguna->totalTransaksi()->row_array();
        $data['pengguna'] = $this->model_kelolapengguna->getAll();
        // $data['riwayat'] = $this->model_buku->riwayat($idmember)->result();
        $data['view'] = ('admin/dashboard/view_verifikasipengguna.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function editPengguna()
    {
        $id = $this->uri->segment(3);
        $this->model_kelolapengguna->updatePengguna($id);
        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Pengguna Berhasil diverifikasi!!</div>');
        $data['pengguna'] = $this->model_kelolapengguna->getAll();
        $data['view'] = ('admin/dashboard/view_verifikasipengguna.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function ktp()
    {
        $idpengguna = $this->uri->segment(3);
        $data['profile'] = $this->model_profile->cekProfile($idpengguna)->row_array();
        $data['view'] = ('admin/dashboard/view_identifikasi.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }
    
        
}
        
    /* End of file  controller_kelolapengguna.php */
        
                            