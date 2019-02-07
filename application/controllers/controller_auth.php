<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // untuk load database
        // $this->load->database();

        // load model
        $this->load->model('model_auth');
        $this->load->model('model_landing');
        $this->load->model('model_buku');
    }

    public function index()
    {
        if ($this->model_auth->logged_id()) {

            $data['rekayasa'] = $this->model_landing->cekKategorirekayasa()->row_array();
            $data['ilmukomputer'] = $this->model_landing->cekKategoriilmukom()->row_array();
            $data['internet'] = $this->model_landing->cekKategoriinternet()->row_array();
            $data['office'] = $this->model_landing->cekKategorioffice()->row_array();

            // untuk direct ke halaman HomePage
            $data['terbaru'] = $this->model_landing->bukuTerbaru();
            $data['optpenulis'] = $this->model_landing->getPengarang()->result();
            $data['optklasifikasi'] = $this->model_landing->getKlasifikasi()->result();

            //mfcm bawaan heru
            $idUser = $_SESSION['ses_id'];
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
            $data['view'] = 'landing/view_homepage';
            $this->load->view('landing/layout/template_homepage', $data);
        } else {
            redirect('controller_auth/login');
        }
    }

    public function login()
    {

        if ($this->model_auth->logged_id()) {
            redirect('Controller_auth');
        } else {

            $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'trim|required|min_length[4]|max_length[20]');

            if ($this->form_validation->run() == true) {
                $nama_pengguna = htmlspecialchars(
                    $this->input->post('nama_pengguna', true),
                    ENT_QUOTES
                );
                $kata_sandi = htmlspecialchars(
                    $this->input->post('kata_sandi', true),
                    ENT_QUOTES
                );

                $cek_admin = $this->model_auth->adminMdl($nama_pengguna, $kata_sandi);

                if ($cek_admin->num_rows() > 0) {
                    $data = $cek_admin->row_array();
                    if ($data['a_level'] == '1') {

                        $admin_data = array(
                            'akses' => '1',
                            'ses_id' => $data['a_id'],
                            'ses_nama' => $data['a_namapengguna'],
                            'ses_foto' => $data['a_fotoprofil'],
                            'masuk' => true,
                        );
                        $this->session->set_userdata($admin_data);
                        redirect('controller_auth');
                    } else {
                        $demo_data = array(
                            'akses' => '0',
                            'ses_id' => $data['a_id'],
                            'ses_nama' => $data['a_namapengguna'],
                            'masuk' => true,
                        );
                        $this->session->set_userdata($demo_data);
                        redirect('controller_auth');
                    }
                } else {
                    $cek_pengguna = $this->model_auth->penggunaMdl($nama_pengguna, $kata_sandi);
                    if ($cek_pengguna->num_rows() > 0) {
                        $data = $cek_pengguna->row_array();
                        $pengguna_data = array(
                            'akses' => '3',
                            'ses_id' => $data['p_id'],
                            'ses_nama' => $data['p_namapengguna'],
                            'ses_foto' => $data['p_fotoprofil'],
                            'masuk' => true,
                        );
                        $this->session->set_userdata($pengguna_data);
                        redirect('controller_auth');
                    } else { // jika username dan password tidak ditemukan atau salah
                        $url = base_url();
                        echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
                        redirect($url);
                    }
                }
            } else {
                // untuk direct ke halaman login langsung
                $data['view'] = 'admin/auth/view_login';
                $this->load->view('layouts/layout_auth/template_login', $data);
            }
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_pengguna.p_email]');
        $this->form_validation->set_rules('kata_sandi', 'Kata sandi', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('konfirmasi_kata_sandi', 'Konfirmasi kata sandi', 'required|matches[kata_sandi]');

        if ($this->form_validation->run() == false) {
            $data['view'] = 'admin/auth/view_register';
            $this->load->view('layouts/layout_auth/template_register', $data);
        } else {
            $nama = $this->input->post('nama');
            $nama_pengguna = $this->input->post('nama_pengguna');
            $email = $this->input->post('email');
            $kata_sandi = $this->input->post('kata_sandi');
            $passhash = hash('md5', $kata_sandi);

            $saltid = md5($email);
            $status = 0;

            $data = array(
                'p_nama' => $nama,
                'p_namapengguna' => $nama_pengguna,
                'p_email' => $email,
                'p_katasandi' => $passhash,
                'p_status' => $status,
            );

            if ($this->model_auth->insertuser($data)) {
                if ($this->sendemail($email, $saltid)) {
                    // successfully sent mail to user email
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please try again ...</div>');
                    redirect(base_url());
                }
                redirect(base_url());

            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');
                redirect(base_url());
            }
        }
    }
    public function sendemail($email, $saltid)
    {
        // configure the email setting
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.mailtrap.io'; //smtp host name
        $config['smtp_port'] = 2525; //smtp port number
        $config['smtp_user'] = '2e2a4c9602d592';
        $config['smtp_pass'] = 'd8938f3f8d9a38'; //$from_email password
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = true;
        $this->email->initialize($config);
        $url = base_url() . "controller_auth/confirmation/" . $saltid;
        $this->email->from('TAperpus@gmail.com', 'CodesQuery');
        $this->email->to($email);
        $this->email->subject('Please Verify Your Email Address');
        $message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with CodesQuery.</p><p>Please click below link to verify your email.</p>" . $url . "<br/><p>Sincerely,</p><p>CodesQuery Team</p></body></html>";
        $this->email->message($message);
        return $this->email->send();
    }

    public function confirmation($key)
    {
        if ($this->model_auth->verifyemail($key)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');
            redirect(base_url());
        }
    }

    // fungsi logout
    public function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }

}
