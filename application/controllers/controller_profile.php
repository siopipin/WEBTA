<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class controller_profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_profile');

        
    }
    public function index()
    {
        redirect('controller_profile/editprofile/', 'refresh');            
    }

    public function editprofile()
    {
        $idpengguna = $this->session->userdata('ses_id');
        
        $data['profile'] = $this->model_profile->cekProfile($idpengguna)->row_array();
        $data['view'] = ('admin/dashboard/view_editprofile.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function profile()
    {
        $idpengguna = $this->uri->segment(3);
        
        $data['profile'] = $this->model_profile->cekProfile($idpengguna)->row_array();
        $data['view'] = ('admin/dashboard/view_editprofile.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }


    public function update()
    {
        $idpengguna = $this->uri->segment(3);
        if(!empty($_FILES['foto']['name'])){
            $this->form_validation->set_rules('vnama', 'Nama', 'required|min_length[3]|max_length[50]');
            
            if ($this->form_validation->run() == FALSE) {
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi kesalahan input, silahkan cek masukkan anda !</div>');
                redirect('controller_profile/editprofile/', 'refresh'); 
            } else {
                $nama = $this->input->post('vnamapengguna');
                $config['upload_path'] = './assets/img/profil/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '2000';
                $config['max_height'] = '1024';
                $config['file_name'] = $nama;
                
                $this->upload->initialize($config);
                
                if(!$this->upload->do_upload("foto")){
                    echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan!!</div>');
                    redirect('controller_profile/editprofile/', 'refresh'); 
                }else{
                    $fotoprofil = $this->upload->data();
                    $idpengguna = $this->session->userdata('ses_id');
                    $nama = $this->input->post('vnama');
                    $namapengguna = $this->input->post('vnamapengguna');
                    $email = $this->input->post('vemail');
                    $tempatlahir = $this->input->post('vtempatlahir');
                    $tanggallahir = $this->input->post('vtanggallahir');
                    $nohp = $this->input->post('vnohp');
                    $jeniskelamin = $this->input->post('vjeniskelamin');
                    $alamat = $this->input->post('valamat');

                    $data = array(
                        'p_id' => $idpengguna,
                        'p_nama' => $nama,
                        'p_namapengguna' => $namapengguna,
                        'p_email' => $email,
                        'p_tempatlahir' => $tempatlahir,
                        'p_tanggallahir' => $tanggallahir,
                        'p_nohp' => $nohp,
                        'p_jeniskelamin' => $jeniskelamin,
                        'p_alamat' => $alamat,
                        'p_fotoprofil' => $fotoprofil['file_name']
                    );

                    $g = $this->model_profile->getFotoprofil($idpengguna)->row_array();

                    //hapus gambar yg ada diserver
                    unlink('assets/img/profil/' . $g['p_fotoprofil']);

                    $this->model_profile->updatePengguna($idpengguna, $data);

                    echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!</div>');
                    redirect('controller_profile/editprofile/', 'refresh'); 
                    
                }
            }   
        }else{
            $this->form_validation->set_rules('vnama', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[50]');
            if ($this->form_validation->run() == FALSE) {
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">3Terjadi kesalahan input, silahkan cek masukkan anda !</div>');
                redirect('controller_profile/editprofile/', 'refresh'); 
            } else {
                $idpengguna = $this->session->userdata('ses_id');
                $nama = $this->input->post('vnama');
                $namapengguna = $this->input->post('vnamapengguna');
                $email = $this->input->post('vemail');
                $tempatlahir = $this->input->post('vtempatlahir');
                $tanggallahir = $this->input->post('vtanggallahir');
                $nohp = $this->input->post('vnohp');
                $jeniskelamin = $this->input->post('vjeniskelamin');
                $alamat = $this->input->post('valamat');

                $data = array(
                    'p_id' => $idpengguna,
                    'p_nama' => $nama,
                    'p_namapengguna' => $namapengguna,
                    'p_email' => $email,
                    'p_tempatlahir' => $tempatlahir,
                    'p_tanggallahir' => $tanggallahir,
                    'p_nohp' => $nohp,
                    'p_jeniskelamin' => $jeniskelamin,
                    'p_alamat' => $alamat
                );
                $this->model_profile->updatePengguna($idpengguna, $data);

                echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!</div>');
                redirect('controller_profile/editprofile/', 'refresh'); 
            }
            
        }
    }


    public function identifikasi()
    {
        $idpengguna = $this->session->userdata('ses_id');
        $data['profile'] = $this->model_profile->cekProfile($idpengguna)->row_array();
        $data['view'] = ('admin/dashboard/view_identifikasi.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function updateIdentifikasi()
    {
        $idpengguna = $this->uri->segment(3);
        $config['upload_path'] = './assets/img/ktp/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '1024';
        $config['file_name'] = $idpengguna;
        
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload("ktp")){
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan!!</div>');
            redirect('controller_profile/identifikasi/', 'refresh'); 
        }else{
            $fotoktp = $this->upload->data();
            $idpengguna = $this->session->userdata('ses_id');
            
            $data = array(
                'p_fotoktp' => $fotoktp['file_name']
            );

            $g = $this->model_profile->getFotoprofil($idpengguna)->row_array();

            //hapus gambar yg ada diserver
            unlink('assets/img/ktp/' . $g['p_fotoktp']);


            $this->model_profile->updatePengguna($idpengguna, $data);

            echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!</div>');
            redirect('controller_profile/identifikasi/', 'refresh'); 
            
        }
    }   
        
    

        
}
        
    /* End of file  controller_profile.php */
        
                            