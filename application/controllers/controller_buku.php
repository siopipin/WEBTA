<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controller_buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_buku');
        $this->load->helper("URL", "DATE", "URI", "FORM");

        //Enkripsi Buku
        $this->load->library('encrypt');
        $this->load->library('aes');
        $this->aesinitvector = openssl_random_pseudo_bytes(16);

        if ($this->session->userdata('masuk') != true) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        $data['view'] = ('admin/dashboard/_partials/part_databuku.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function tambah()
    {

        $this->_validasi();
        $this->form_validation->set_rules('vbahasa', 'Bahasa', 'required');
        

        if ($this->form_validation->run() == false) {
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi kesalahan input, silahkan cek masukkan anda !</div>');
            $data['view'] = ('admin/dashboard/_partials/part_tambahbuku.php');
            $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
        } else {
            $judul = $this->input->post('vjudul');
            $cek = $this->model_buku->cekBuku($judul);
            //jika ada duplikat id buku
            if ($cek->num_rows() > 0) {
                $url = site_url('controller_page/tambahbuku');
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Buku Telah Tersimpan dalam sistem !</div>');
                redirect($url);
            } else {

                $judul = $this->input->post('vjudul');
                $config['upload_path'] = './assets/img/buku/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000';
                $config['max_width'] = '2000';
                $config['max_height'] = '1024';
                $config['file_name'] = $judul;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('sampul')) {
                    $url = site_url('controller_page/tambahbuku');
                    echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan!!</div>');
                    redirect($url);
                } else {
                    $img = $this->upload->data();
                    $judul = $this->input->post('vjudul');
                    $pengarang = $this->input->post('vpengarang');
                    $deskripsi = $this->input->post('vdeskripsi');
                    $klasifikasi = $this->input->post('vklasifikasi');
                    $isbn = $this->input->post('visbn');
                    $penerbit = $this->input->post('vpenerbit');
                    $tahunterbit = $this->input->post('vtahunterbit');
                    $bahasa = $this->input->post('vbahasa');

                    $data = array(
                        'b_judul' => $judul,
                        'b_pengarang' => $pengarang,
                        'b_klasifikasi' => $klasifikasi,
                        'b_deskripsi' => $deskripsi,
                        'b_isbn' => $isbn,
                        'b_penerbit' => $penerbit,
                        'b_tahunterbit' => $tahunterbit,
                        'b_bahasa' => $bahasa,
                        'b_sampul' => $img['file_name'],
                    );
                    $this->model_buku->insertBuku("tbl_buku", $data);

                    $url = site_url('controller_page/tambahbuku');
                    echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil ditambah!!</div>');

                    redirect($url);
                }

            }

        }

    }

    public function update()
    {
        $idbuku = $this->uri->segment(3);

        $data['edit'] = $this->model_buku->cekBuku($idbuku)->row_array();

        if (!empty($_FILES['sampul']['name'])) {
            $this->_validasi();

            if ($this->form_validation->run() == false) {
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi kesalahan input, silahkan cek masukkan anda !</div>');
                $data['view'] = ('admin/dashboard/_partials/part_editbuku.php');
                $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
            } else {
                $idbuku = $this->input->post('vidbuku');
                $config['upload_path'] = './assets/img/buku/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1000';
                $config['max_width'] = '2000';
                $config['max_height'] = '1024';
                $config['file_name'] = $judul;

                $this->upload->initialize($config);
                

                if (!$this->upload->do_upload('sampul')) {
                    $url = site_url('controller_page/editbuku');
                    echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan!!</div>');
                    redirect($url);
                } else {
                    $img = $this->upload->data();
                    $idbuku = $this->input->post('vidbuku');
                    $judul = $this->input->post('vjudul');
                    $pengarang = $this->input->post('vpengarang');
                    $deskripsi = $this->input->post('vdeskripsi');
                    $klasifikasi = $this->input->post('vklasifikasi');
                    $isbn = $this->input->post('visbn');
                    $penerbit = $this->input->post('vpenerbit');
                    $tahunterbit = $this->input->post('vtahunterbit');
                    $bahasa = $this->input->post('vbahasa');

                    $data = array(
                        'b_idbuku' => $idbuku,
                        'b_judul' => $judul,
                        'b_pengarang' => $pengarang,
                        'b_klasifikasi' => $klasifikasi,
                        'b_deskripsi' => $deskripsi,
                        'b_isbn' => $isbn,
                        'b_penerbit' => $penerbit,
                        'b_tahunterbit' => $tahunterbit,
                        'b_bahasa' => $bahasa,
                        'b_sampul' => $img['file_name'],
                    );

                    $g = $this->model_buku->getGambar($idbuku)->row_array();

                    //hapus gambar yg ada diserver
                    unlink('assets/img/buku/' . $g['b_sampul']);

                    $this->model_buku->updateBuku($idbuku, $data);

                    $url = site_url('controller_page/databuku');
                    echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!</div>');

                    redirect($url);

                }
            }

        }
        // kalau tidak ada gambar yang diupdate
        else {
            $this->_validasi();

            if ($this->form_validation->run() == false) {
                echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi kesalahan input, silahkan cek masukkan anda !</div>');
                $data['view'] = ('admin/dashboard/_partials/part_editbuku.php');
                $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
            } else {
                $idbuku = $this->input->post('vidbuku');
                $judul = $this->input->post('vjudul');
                $pengarang = $this->input->post('vpengarang');
                $deskripsi = $this->input->post('vdeskripsi');
                $klasifikasi = $this->input->post('vklasifikasi');
                $isbn = $this->input->post('visbn');
                $penerbit = $this->input->post('vpenerbit');
                $tahunterbit = $this->input->post('vtahunterbit');
                $bahasa = $this->input->post('vbahasa');

                $data = array(
                    'b_idbuku' => $idbuku,
                    'b_judul' => $judul,
                    'b_pengarang' => $pengarang,
                    'b_klasifikasi' => $klasifikasi,
                    'b_deskripsi' => $deskripsi,
                    'b_isbn' => $isbn,
                    'b_penerbit' => $penerbit,
                    'b_tahunterbit' => $tahunterbit,
                    'b_bahasa' => $bahasa,
                );

                $this->model_buku->updateBuku($idbuku, $data);

                $url = site_url('controller_page/databuku');
                echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil diupdate!!</div>');

                redirect($url);

            }

        }
    }
    
    
    public function delete()
    {

        $id = $this->uri->segment(3);
        $this->model_buku->deleteBuku($id);
        $url = site_url('controller_page/databuku');
        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil dihapus!!</div>');

        redirect($url);

    }

    public function _validasi()
    {
        $this->form_validation->set_rules('vjudul', 'Judul Buku', 'trim|required|min_length[5]|max_length[200]');
        $this->form_validation->set_rules('vpengarang', 'Pengarang', 'trim|required|min_length[5]|max_length[200]');
        $this->form_validation->set_rules('vdeskripsi', 'Deksripsi', 'trim|required|min_length[10]|max_length[2000]');
        $this->form_validation->set_rules('visbn', 'isbn', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('vpenerbit', 'Penerbit', 'trim|required|min_length[5]|max_length[200]');
        $this->form_validation->set_rules('vtahunterbit', 'Tahun Terbit', 'trim|required|min_length[5]|max_length[50]');
        
    }

    // enkripsi buku
    // tampilkan buku yang belum terupload file
    public function file()
    {
        $enkrip = $this->input->post("enkripfile");
        $password = $this->input->post("pass");
        if (isset($enkrip) && !empty($password)) {
            $writedir = $_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/uploads";
            // $id_user = $this->session->userdata('sess_nama');
            $id_user = '1';
            //Password di Hash dengan SHA256
            $passhash = hash("SHA256", $password, true);
            $aesinitv = $this->aesinitvector;
            $namefile = $_FILES["file"]["name"];
            if (($_FILES["file"]["error"] < 1) && ($_FILES["file"]["size"] < 3145728)) { //max size file
                while (1) {
                    $pinncode = mt_rand(10, 100000);
                    $enkripname = $pinncode . "_" . $_FILES["file"]["name"] . ".encrypted";
                    $filename = ($writedir . "/" . $enkripname);
                    if (!file_exists($filename)) {
                        break;
                    }
                }
                $filesize = $_FILES['file']['tmp_name'];
                $filesource = fopen($_FILES["file"]["tmp_name"], "rb");
                $filenew = fopen($filename, "wb");
                $data_insert = array(
                    'd_namadokumen' => $namefile,
                    'd_iduser' => $id_user,
                    'd_iddokumen' => $pinncode,
                    'd_namaenkrip' => $enkripname,
                );
                $this->db->insert('tbl_dokumen', $data_insert);
                if (($filesource !== false) && ($filenew !== false)) {
                    fwrite($filenew, "" . $_FILES["file"]["name"] . ""); # filename as string (unknown length)
                    fwrite($filenew, "\1"); # non-printable separator (1 byte)
                    fwrite($filenew, "" . $_FILES["file"]["size"] . ""); # filesize in bytes (unknown length)
                    fwrite($filenew, "\1"); # non-printable separator (1 byte)
                    fwrite($filenew, "enkrip"); # filename as string (unknown length)
                    fwrite($filenew, "\1"); # non-printable separator (1 byte)
                    $magicstring = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $passhash, "magicstring", MCRYPT_MODE_CBC, $aesinitv);
                    fwrite($filenew, $magicstring); # encrypted magic string (16 bytes)
                    fwrite($filenew, $aesinitv); # initialization vector (16 bytes)
                    //proses enkripsi//
                    $filesourcedata = fread($filesource, filesize($filesize));
                    $aes = new AesCtr();
                    $enkripdata = $aes->encrypt($filesourcedata, $passhash, 128);
                    $encodedata = base64_encode($enkripdata); //hasil enkripsi di encode dengan BASE64
                    fwrite($filenew, $encodedata);
                    //---//
                    fclose($filenew);
                    fclose($filesource);
                    $data['success'] = "Enkripsi File Berhasil";
                }
            } else {
                $data['alert'] = "Enkripsi File Gagal";
            }
        }
        $data['view'] = ('admin/dashboard/_partials/part_tambahbuku.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }


    public function simpanTransaksi()
    {
        $idbuku = $this->uri->segment(3);
        $idpengguna = $this->session->userdata('ses_id');
        $hariini = date('Y-m-d H:i:s');
        $tglkembali = date('Y-m-d H:i:s', strtotime('+7 day', strtotime($hariini)));
        $data = array(
            't_idpengguna' => $idpengguna,
            't_idbuku' => $idbuku,
            't_tanggalkembali' => $tglkembali
        );
        // handle maksimal penminjaman
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");       
        $query = $mysqli->query("SELECT * FROM `tbl_pengguna` WHERE p_id = ".$_SESSION['ses_id']);
        $query2 = $mysqli->query("SELECT * FROM `tbl_transaksi` WHERE t_idpengguna = ".$_SESSION['ses_id']." AND t_status = 'Y'");
        $result = mysqli_num_rows($query2);
        $pengguna = $query->fetch_assoc();
        $ktp = $pengguna['p_fotoktp'];
        $verifikasi = $pengguna['p_verifikasi'];
        if(strlen($ktp) < 1){//Jika User tidak upload foto ktp
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Silahkan lengkapi identitas pengguna !</div>');    
        }
        elseif($verifikasi ==0){//Jika aku belum diverifikasi
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Dimohon untuk menunggu verifikasi dari admin !</div>');    
        }
        elseif($result >=4){//Jika jumlah pinjaman melebihi 4
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Jumlah Peminjaman sudah melampaui batas !</div>');    
        }
        else{
        $this->model_buku->insertPeminjaman("tbl_transaksi",$data);
        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Buku Berhasil Terpinjam !</div>');
        }
        redirect('controller_landing/detailBuku/'.$idbuku, 'refresh');
        
    }



    public function bukuTerpinjam()
    {
        $idmember = $this->session->userdata('ses_id');
        
        $data['buku'] = $this->model_buku->bukuTerpinjam($idmember)->result();
        $data['view'] = ('admin/dashboard/view_bukuterpinjam.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    public function baca()
    {
        $idbuku = $this->uri->segment(3);
        $idmember = $this->session->userdata('ses_id');
        $data['cek'] = $this->model_buku->detailBuku($idbuku)->row_array();
        $data['ulasan'] = $this->model_buku->cekUlasanmember($idbuku, $idmember)->row_array();
        $data['buku'] = $this->model_buku->bukuTerpinjam($idmember)->row_array();
        $data['dokumen'] = $this->model_buku->bukuDokumen($idbuku)->row_array();
        $data['view'] = ('admin/dashboard/view_baca.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
        //$this->model_buku->filedek3();
        $this->model_buku->filedek2($idbuku);
        //redirect('controller_dekripsi/filedek/'.$idbuku, 'refresh');
    }

    public function ulas()
    {
        $this->form_validation->set_rules('vrating', 'Rating', 'required');
        $this->form_validation->set_rules('vcekbox', 'Cek Box', 'required');
        
        $idbuku = $this->uri->segment(3);
        $idmember = $this->session->userdata('ses_id');
        
        
        if ($this->form_validation->run() == false) {
            echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Terjadi kesalahan input, silahkan cek masukkan anda !</div>');
            redirect('controller_buku/baca/'.$idbuku, 'refresh');
        } else {
            $cek = $this->model_buku->cekUlas($idbuku,$idmember);
            $idbuku = $this->uri->segment(3);
                $idmember = $this->session->userdata('ses_id');
                $ulasan = $this->input->post('vulasan');
                $rating = $this->input->post('vrating');
                $data = array(
                    'r_idbuku' => $idbuku,
                    'r_iduser' => $idmember,
                    'r_rating' => $rating,
                    'r_ulasan' => $ulasan
                );
            if($cek->num_rows() > 0)
            {
                $this->model_buku->insertRating("UPDATE",$data);
                echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Terimakasih Anda Telah Mengulas Buku ini !</div>');
                redirect('controller_buku/baca/'.$idbuku, 'refresh');
             
            }
            else{                
                $mysqli = new mysqli("localhost", "root", "", "db_perpus");       
                $query = $mysqli->query("SELECT * FROM tbl_rating WHERE r_iduser = ".$idmember." AND r_idbuku =".$idbuku);
                $isRated = mysqli_num_rows($query);                
                $this->model_buku->insertRating("INSERT",$data);                   
                echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Terimakasih, Buku Berhasil Diulas !</div>');
                redirect('controller_buku/baca/'.$idbuku, 'refresh');
            }
        }
    }

    public function kembalikan()
    {
        $idtransaksi = $this->uri->segment(3);
        $tglkembali = date('Y-m-d H:i:s');
        $data = array(
            't_status' => 'N',
            't_tanggalkembali' => $tglkembali
        );
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
        $query = $mysqli->query("SELECT * FROM tbl_transaksi WHERE t_idtransaksi =".$idtransaksi);
        $data2 = $query->fetch_assoc();
        $idbuku = $data2['t_idbuku'];
        $mysqli->query("UPDATE `tbl_buku` SET b_jumlah = b_jumlah+1 WHERE b_idbuku =".$idbuku);
        
        //$statue=$mysqli->query("UPDATE `tbl_transaksi` SET t_status = 'N' WHERE t_idtransaksi = ".$idtransaksi);
        echo "<script type='text/javascript'>alert('".$idtransaksi."')</script>";
        $this->model_buku->updateTransaksi($idtransaksi, $data);
        
        
        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Buku Berhasil dikembalikan!!</div>');

        redirect('controller_buku/bukuterpinjam/', 'refresh');

    }

    public function perpanjang()
    {
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
        $idbuku = $this->uri->segment(3);
        $query = $mysqli->query("SELECT * FROM tbl_transaksi WHERE t_idbuku =".$idbuku." AND t_idpengguna =".$_SESSION['ses_id']." AND t_status='Y'");
        $data = $query->fetch_assoc(); 
        $idtransaksi = $data['t_idtransaksi'];
        $query = $mysqli->query("UPDATE tbl_transaksi set t_status = 'N' WHERE t_idtransaksi =".$idtransaksi);
        
        $idpengguna = $this->session->userdata('ses_id');
        $hariini = date('Y-m-d H:i:s');
        $tglkembali = date('Y-m-d H:i:s', strtotime('+7 day', strtotime($hariini)));
        $data = array(
            't_idpengguna' => $idpengguna,
            't_idbuku' => $idbuku,
            't_tanggalkembali' => $tglkembali,
            't_status' => 'Y'
        );
        $this->model_buku->insertPeminjaman("tbl_transaksi",$data);
        echo $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Buku Berhasil Diperpanjang !</div>');

        redirect('controller_buku/bukuterpinjam/', 'refresh');

    }

   
}

/* End of file  controller_buku.php */
