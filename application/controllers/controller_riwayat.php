<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class controller_riwayat extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->model('model_buku');
    
}
public function index()
{
    redirect('controller_riwayat/riwayat/', 'refresh');
}

public function riwayat()
{
    $idmember = $this->session->userdata('ses_id');
        
    $data['riwayat'] = $this->model_buku->riwayat($idmember)->result();
    $data['view'] = ('admin/dashboard/view_riwayat.php');
    $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
}
        
}
        
    /* End of file  controller_riwayat.php */
        
                            