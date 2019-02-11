<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controller_landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('model_landing');
        $this->load->model('model_buku');
        if ($this->session->userdata('masuk') != true) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        if ($this->model_auth->logged_id()) {
            $data['terbaru'] = $this->model_landing->bukuTerbaru();
            $data['view'] = 'landing/view_homepage';
            $this->load->view('landing/layout/template_homepage', $data);
        } else {

            redirect('controller_auth/login');
           
        }
    }

    public function detailBuku()
    {
        $idbuku = $this->uri->segment(3);

        $data['edit'] = $this->model_landing->cekBuku($idbuku)->row_array();
        $data['view'] = ('landing/view_detailbuku.php');
        $this->load->view('landing/layout/template_homepage.php', $data);
    }


    // Tampilkan buku berdasarkan klasifikasi
    public function bukuKlasifikasi()
    {
        //ini default hasil
        // $data['klasifikasi'] = $this->model_landing->cekKlasifikasi($klasifikasi)->row_array();


        // Tampilkan semua buku pada homepage dengan pagination 
        $config = array();
        $config["base_url"] = base_url() . "controller_landing/bukuklasifikasi";
        $klasifikasi = $this->uri->segment(3);
        //Konversi nama buku remove 
        $klasifikasi2="";
        for($i=0;$i<strlen($klasifikasi);$i++){
            if($klasifikasi[$i]!="%" || $klasifikasi[$i]!='%'){
                $klasifikasi2 .= $klasifikasi[$i];
            }
            else {$i+=2;$klasifikasi2.=' ';}
        }
        $klasifikasi=$klasifikasi2;
        $config["total_rows"] = $this->model_landing->hitungBukuKlasifikasi($klasifikasi);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;


         //ubah paginatio dengan bootsrap
         $config['first_link']       = 'First';
         $config['last_link']        = 'Last';
         $config['next_link']        = 'Next';
         $config['prev_link']        = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->model_landing->
            tampilBukuKlasifikasi($config["per_page"], $page, $klasifikasi);
        $data["links"] = $this->pagination->create_links();
        
        $data['view'] = ('landing/view_bukuklasifikasi.php');
        $this->load->view('landing/layout/template_homepage.php', $data);
    }


    // Cari buku dengan ajax di landing page
    public function cariBuku()
    {

        //Pencarian buku dengan ajax
        $output = '';
        $query = '';
        $this->load->model('model_landing');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->model_landing->telusuri($query);
        if ($data->num_rows() > 0) {
            $cekcount = 0;
            foreach ($data->result() as $row) {
                $cekcount++;
                if ($cekcount > 4) {
                    break;
                }
                $output .= '
                <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="home-tab">
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4>' . $row->b_judul . '</h4>
                                    <ul class="mt-4">
                                        <li class="mb-3">
                                            <h5><i class="fa fa-map-marker"></i>' . $row->b_isbn . '</h5>
                                        </li>
                                        <li class="mb-3">
                                            <h5><i class="fa fa-pie-chart"></i>' . $row->b_pengarang . '</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-clock-o"></i>' . $row->b_penerbit . '</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-clock-o"></i>' . $row->b_tahunterbit . '</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-clock-o"></i>' . $row->b_bahasa . '</h5>
                                        </li>

                                    </ul>
                                </div>

                                <div class="job-btn col-md-2 align-self-center">
                                    <img src="' . base_url('assets/img/buku/' . $row->b_sampul) . '" style="width: 100%;height: 150px;background-repeat: no-repeat;background-position: center;background-size: cover" alt="job">
                                    <a href="'. site_url('controller_landing/detailBuku/'.$row->b_idbuku).'" class="third-btn job-btn1">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
              ';
            }
        } else {
            $output .= '
                
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="recent" role="tabpanel" aria-labelledby="home-tab">
                <div class="single-job mb-4 d-lg-flex justify-content-between">
                    <div class="text-center">
                        <h4> Buku Tidak Ditemukan, Silahkan periksa kata pencarian anda! </h4>
                    </div>    
                </div>
            </div>
        </div>
            ';
        }
        echo $output;

    }

    public function semuabuku()
    {
        // Tampilkan semua buku pada homepage dengan pagination 
        $config = array();
        $config["base_url"] = base_url() . "controller_landing/semuabuku";
        $config["total_rows"] = $this->model_landing->hitungBuku();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3; 


         //ubah paginatio dengan bootsrap
         $config['first_link']       = 'First';
         $config['last_link']        = 'Last';
         $config['next_link']        = 'Next';
         $config['prev_link']        = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->model_landing->
            tampilBuku($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $data['view'] = 'landing/view_semuabuku';
        $this->load->view('landing/layout/template_homepage', $data);
        
    }

    public function semuaRekomendasi()
    {

        // Tampilkan semua buku pada homepage dengan pagination 
        $config = array();
        $config["base_url"] = base_url() . "controller_landing/semuabuku";
        $config["total_rows"] = 12;//$this->model_landing->hitungBuku();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;


        //ubah paginatio dengan bootsrap
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

         //mfcm bawaan heru


         $idUser = $_SESSION['ses_id'];

         if(strlen($idUser) <1){
            $data['mfcm'] = $this->model_buku->getMfcm(0);
         }
         else{
            $mysqli = new mysqli("localhost", "root", "", "db_perpus");       
            $query = $mysqli->query("SELECT * FROM tbl_rating where r_iduser = ".$idUser);
            $jlh = mysqli_num_rows($query);
            //echo "<script type='text/javascript'> alert('Jumlahnya : ".$jlh." | ".$idUser."')</script>";
            if($jlh==0){
                $data['mfcm'] = $this->model_buku->getMfcm(0);
            }
            else {
                $data['mfcm'] = $this->model_buku->getMfcm($idUser);
            }
        }
         

        $data["links"] = $this->pagination->create_links();
        $data['view'] = 'landing/view_semuaRekomendasi';
        $this->load->view('landing/layout/template_homepage', $data);
    }


    public function semuakategori()
    {
       
        // Tampilkan semua buku pada homepage dengan pagination 
        $config = array();
        $config["base_url"] = base_url() . "controller_landing/semuakategori";
        $config["total_rows"] = $this->model_landing->hitungKategori();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;


         //ubah paginatio dengan bootsrap
         $config['first_link']       = 'First';
         $config['last_link']        = 'Last';
         $config['next_link']        = 'Next';
         $config['prev_link']        = 'Prev';
         $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
         $config['full_tag_close']   = '</ul></nav></div>';
         $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
         $config['num_tag_close']    = '</span></li>';
         $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
         $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
         $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
         $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['prev_tagl_close']  = '</span>Next</li>';
         $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
         $config['first_tagl_close'] = '</span></li>';
         $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
         $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->model_landing->
            tampilKlasifikasi($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $data['view'] = 'landing/view_semuakategori';
        $this->load->view('landing/layout/template_homepage', $data);
        
    }

    public function tentang()
    {
        $data['view'] = ('landing/view_tentang.php');
        $this->load->view('landing/layout/template_homepage.php', $data);
    }

    public function kontak()
    {
        $data['view'] = ('landing/view_kontak.php');
        $this->load->view('landing/layout/template_homepage.php', $data);
    }

}

/* End of file  controller_landing.php */
