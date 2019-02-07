<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class model_auth extends CI_Model
{

    // fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('masuk');
    }

    // untuk tambah pengguna di database
    public function insertuser($data)
    {
        return $this->db->insert('tbl_pengguna', $data);
    }

    // untuk verifikasi email
    public function verifyemail($key)
    {
        $data = array('p_status' => 1);
        $this->db->where('md5(p_email)', $key);
        return $this->db->update('tbl_pengguna', $data);
    }

    //cek username dan password admin
    function adminMdl($nama_pengguna, $kata_sandi)
    {
        $query = $this->db->query("SELECT * FROM tbl_admin WHERE a_namapengguna='$nama_pengguna' AND a_katasandi=MD5('$kata_sandi') LIMIT 1" );
        return $query;
    }

    //cek username dan password member
    function penggunaMdl($nama_pengguna,$kata_sandi){
        $query=$this->db->query("SELECT * FROM tbl_pengguna WHERE p_namapengguna='$nama_pengguna' AND p_katasandi=MD5('$kata_sandi') LIMIT 1");
        return $query;
    }

   
}