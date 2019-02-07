<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controller_enkripsi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->library('aes');
        $this->load->model('model_buku');
        $this->aesinitvector = openssl_random_pseudo_bytes(16);
    }


    public function index()
    {
        if ($this->session->userdata('akses') == '1') {
            redirect('controller_enkripsi/file');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function file(){
        $data['optjudul'] = $this->model_buku->getjudul()->result();
        
        $enkrip = $this->input->post("enkripfile");
        

        if(isset($enkrip)){

		$writedir = $_SERVER['DOCUMENT_ROOT']."/TAPerpus/uploads";

        $id_buku = $this->input->post('vidbuku');
		$passhash ="";
        for($i=0;$i<32;$i++){
          $num =rand(65,90);
          $passhash = $passhash.(chr($num));
        }
        $data['bacot'] = $passhash;
		$aesinitv = $this->aesinitvector;
		$namefile = $_FILES["file"]["name"];

			if (($_FILES["file"]["error"] < 1) && ($_FILES["file"]["size"] < 3145728)){ //max size file
				while (1)
				{
					$pinncode = mt_rand(10,100000);
                    $enkripname = $pinncode."_".$_FILES["file"]["name"].".encrypted";
					$filename = ($writedir."/".$enkripname);
					if (!file_exists($filename)) { break; }
				}
				$filesize = $_FILES['file']['tmp_name'];
				$filesource = fopen($_FILES["file"]["tmp_name"], "rb");
				$filenew = fopen($filename, "wb");

                $data_insert = array(
					'd_namadokumen' => $namefile,
                    'd_idbuku' => $id_buku,
					'd_iddokumen' => $pinncode,
                    'd_namaenkrip' => $enkripname,
                    'd_key' => $passhash
				);
                $this->db->insert('tbl_dokumen', $data_insert);
                $data = array(
                    'b_idbuku' => $id_buku,
					'b_statusdokumen' => '1'
				);
                $this->model_buku->updateBuku($id_buku, $data);

				if (($filesource !== false) && ($filenew !== false)){
					fwrite($filenew, "".$_FILES["file"]["name"].""); # filename as string (unknown length)
					fwrite($filenew, "\1"); # non-printable separator (1 byte)
					fwrite($filenew, "".$_FILES["file"]["size"].""); # filesize in bytes (unknown length)
					fwrite($filenew, "\1"); # non-printable separator (1 byte)
					fwrite($filenew, "enkrip"); # filename as string (unknown length)
					fwrite($filenew, "\1"); # non-printable separator (1 byte)
					$magicstring = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $passhash, "magicstring", MCRYPT_MODE_CBC, $aesinitv);
					fwrite($filenew, $magicstring); # encrypted magic string (16 bytes)
					fwrite($filenew, $aesinitv); # initialization vector (16 bytes)

                    //proses enkripsi//
						$filesourcedata = fread($filesource,filesize($filesize));
						$aes = new AesCtr();
						$enkripdata = $aes->encrypt($filesourcedata, $passhash, 128);
                        $encodedata = base64_encode($enkripdata); //hasil enkripsi di encode dengan BASE64
						fwrite($filenew, $encodedata);
                    //---//

					fclose($filenew);
					fclose($filesource);
                    $data['success'] = "Enkripsi File Berhasil";
                    $data['success'] = $passhash;
				}
            }else{
                $data['alert'] = "Enkripsi File Gagal";
            }
        }

        $data['view'] = ('admin/dashboard/_partials/part_enkripsi.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

}

/* End of file  controller_enkripsi.php */
