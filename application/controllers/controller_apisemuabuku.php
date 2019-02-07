<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;


require APPPATH . 'libraries/Format.php';

class controller_apisemuabuku extends REST_Controller {
    function __construct(){
        parent:: __construct();
        $this->load->model('model_buku');
        $this->load->model('model_landing');
    }

    public function index_get()
    {
        // $this->response($this->db->get('tbl_buku')->result());
        // $data['terbaru'] = $this->model_landing->bukuTerbaru();
        $jlh = $this->model_landing->bukuTerbaru()->result();
        if( !empty( $jlh ) ) {
            $this->response(
                 $jlh);
        } else {
            $this->response(array(
                'message' => 'unsuccess', 
                'status' => 'false'));
        }
    }
        
}
        
    /* End of file  api_semuabuku.php */
        
                            