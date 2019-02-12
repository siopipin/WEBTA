<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load model model_auth
        $this->load->model('model_buku');
        $this->load->model('model_laporan');
        $this->load->model('model_kelolapengguna');
        $this->load->model('model_landing');
        if ($this->session->userdata('masuk') != true) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        $data['jumlahbuku'] = $this->model_buku->hitungbuku()->row_array();
        $data['jumlahmember'] = $this->model_buku->hitungmember()->row_array();
        $data['jumlahtransaksi'] = $this->model_buku->hitungtransaksi()->row_array();
        $data['jumlahtransaksiaktif'] = $this->model_buku->hitungtransaksiaktif()->row_array();
        $transaksi = $this->model_buku->bukupopuler();
        $data['transaksi'] = $transaksi->result();
        $data['chart'] = json_encode($this->model_buku->get_data()->result());

        //mfcm bawaan heru
        if (!(isset($_SESSION['ses_id']))) {
            $data['mfcm'] = $this->model_buku->getMfcm(0);
        } else {
            if($_SESSION['akses']== 1){
                $data['dataTest'] = $this->model_buku->getMfcm(-1);
            }
            else{
                $idUser = $_SESSION['ses_id'];
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
        }

        $idUser = $_SESSION['ses_id'];

        $data['ulasan'] = $this->model_buku->ulasan()->result();

        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();

        $data['tolak'] = $this->model_kelolapengguna->pesantolak($idUser)->row_array();
        echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Verifikasi Identitas Anda ditolak, silahkan cek atau upload ulang identitas Anda</div>');
        echo $this->session->set_flashdata('msg2', '<div class="alert alert-info" role="alert">Silahkan upload Identitas Anda untuk dapat meminjam buku</div>');
        $data['view'] = 'admin/dashboard/view_dashboard';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);      
    }

    public function pesanPengunjung()
    {
        $data['pesan'] = $this->model_laporan->semuaPesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();

        $pesan = $this->model_laporan->semuaPesan()->result();
        $data['pesanlama'] = $this->model_laporan->semuaPesanlama()->result();
        $data['view'] = 'admin/dashboard/view_pesan';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data); 
    }

    public function updatepesan()
    {

        $id = $this->uri->segment(3);
        $status = 1;
        $data = array(
            'pe_status' => $status,
        );
        $this->model_laporan->updatepesan($id, $data);

        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Pesan Berhasil terbaca!!</div>');
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        $data['pesanlama'] = $this->model_laporan->semuaPesanlama()->result();
        $data['view'] = 'admin/dashboard/view_pesan';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function hapus()
    {
        $id = $this->uri->segment(3);
        $this->model_laporan->deletePesan($id);
       

        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        $data['pesanlama'] = $this->model_laporan->semuaPesanlama()->result();
        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Pesan Berhasil dihapus!!</div>');
        $data['view'] = 'admin/dashboard/view_pesan';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);

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
            redirect('controller_dashboard', 'refresh');
        }
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();

        echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Rating Gagal disimpan!!</div>');
        redirect('controller_dashboard', 'refresh');

    }

    public function updateverifikasi()
    {

        $id = $this->uri->segment(3);
        $status = 3;
        $data = array(
            'p_verifikasi' => $status,
        );
        $this->model_laporan->updateverifikasi($id, $data);

        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Pesan Peringatan Terkirim!!</div>');
        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();
        $data['pesanlama'] = $this->model_laporan->semuaPesanlama()->result();
        $data['pengguna'] = $this->model_kelolapengguna->getAll();
        $data['view'] = 'admin/dashboard/view_verifikasipengguna';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

 

    
}