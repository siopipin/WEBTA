<?php

defined('BASEPATH') or exit('No direct script access allowed');

class controller_dekripsi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->library('aes');

        $this->aesinitvector = openssl_random_pseudo_bytes(16);

        $this->load->model('model_buku');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == '1') {
            redirect('controller_dekripsi/filedek');
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }

    public function filedek()
    {
     
        //$data['optjudul'] = $this->model_buku->getdok()->result();
        $dekrip = $this->input->post("dekripfile");
        $password = $this->input->post("pass");

        if (isset($dekrip)) {
            
            $writedir = $_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/uploads";
            $passhash = $password;
            $aesinitv = $this->aesinitvector;
            $namefile = $_FILES["file"]["name"];

            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $namefile = $_FILES['file']['tmp_name'];
                $allowed = array('encrypted');
                $filename = $_FILES['file']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                
                /*if(!in_array($ext,$allowed) ) {
                $alert2 = "Decrypt File Gagal, File yang di Input Bukan File Enkripsi";
                } else {*/
                $sourcesize = filesize($namefile);
                $filesource = fopen($namefile, "rb");
                //echo "<script type='text/javascript'>alert('|".$namefile."|');</script>";
                if ($filesource !== false) {
                    $filename = "";
                    $filechar = "";
                    while ($filechar != "\1") {$filename .= $filechar;
                        $filechar = fread($filesource, 1);
                        $stream_meta_data = stream_get_meta_data($filesource);
                        if ($stream_meta_data['unread_bytes'] <= 0) {
                            break;
                        }
                    }
                    $filesize = "";
                    $filechar = "";
                    while ($filechar != "\1") {$filesize .= $filechar;
                        $filechar = fread($filesource, 1);
                        $stream_meta_data = stream_get_meta_data($filesource);
                        if ($stream_meta_data['unread_bytes'] <= 0) {
                            break;
                        }
                    }
                    $filesize = intval($filesize);
                    $fileket = "";
                    $filechar = "";
                    while ($filechar != "\1") {$fileket .= $filechar;
                        $filechar = fread($filesource, 1);
                        $stream_meta_data = stream_get_meta_data($filesource);if ($stream_meta_data['unread_bytes'] <= 0) {
                            break;
                        }
                    }
                    if ($fileket == "enkrip") {
                        $magicode = fread($filesource, 16);
                        $aesinitv = fread($filesource, 16);
                        $dmessage = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $passhash, $magicode, MCRYPT_MODE_CBC, $aesinitv);
                        
                        if (rtrim($dmessage) == "magicstring") {
                            // header('Content-Type: application/octet-stream');
                            // header('Content-Disposition: attachment; filename="' . $filename . '"');
                            // header('Content-Length: ' . $filesize);

                            $filesourcedata = fread($filesource, filesize($namefile));
                            $decodedata = base64_decode($filesourcedata);
                            $aes = new AesCtr();
                            $dmessage = $aes->decrypt($decodedata, $passhash, 128);
                            $tujuan = $_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/decrypt/".$filename;
                            $hasilDekrip = file_put_contents($tujuan,$dmessage);

                            //print($dmessage);
                            
                            //fclose($fsrcobjc);
                            //exit(0);
                            $data["succes"] = "Dekripsi File Berhasil";
                        } else {
                            $data["alert"] = "Password Salah";}
                    } else {
                        $data["alert"] = "bukan file enkrip";}
                } else {
                    $data["alert"] = "error";}
            }
            //}
        }
        $data['view'] = ('admin/dashboard/_partials/part_dekripsi.php');
        $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

    

}

/* End of file  controller_dekripsi.php.php */
