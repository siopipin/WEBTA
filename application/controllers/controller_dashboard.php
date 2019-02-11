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

        $data['view'] = 'admin/dashboard/view_dashboard';
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);      
    }

 

    
}