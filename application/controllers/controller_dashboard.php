<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load model model_auth
        $this->load->model('model_auth');
    }

    public function index()
    {

        if($this->model_auth->logged_id())
        {
            $data['view'] = 'admin/dashboard/view_dashboard';
            $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
        }
        else
        {
            redirect('controller_auth/login');
        }        
    }

 

    
}