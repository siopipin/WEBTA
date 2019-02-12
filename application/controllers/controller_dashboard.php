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

        $data['ulasan'] = $this->model_buku->ulasan()->result();

        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();

        $data['view'] = 'admin/dashboard/view_dashboard';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);      
    }

 

    
}