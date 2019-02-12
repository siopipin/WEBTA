<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controller_infovisitor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->load->model('model_landing');
        $this->load->library('user_agent');
        if ($this->session->userdata('masuk') != true) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        redirect('controller_infovisitor/infoVisitor/', 'refresh');
    }

    public function infoVisitor()
    {
        
       

        $data['nama'] = $this->session->userdata('ses_nama');
        $data['ip'] = $this->input->ip_address();
        $data['useragent'] = $this->input->user_agent();
        // $data['session'] = $this->session->all_userdata();
        $data['online'] = $_SERVER['HTTP_USER_AGENT'];
        $data['browser'] = $this->agent->browser();
        $data['browser_version'] = $this->agent->version();
        $data['os'] = $this->agent->platform();

        $data['pesan'] = $this->model_landing->pesan()->result();
        $data['hitungpesan'] = $this->model_landing->hitungpesan()->row_array();

        $data['view'] = ('admin/dashboard/visitor/view_infovisitor.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

}

/* End of file  controller_infovisitor.php */
