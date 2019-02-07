<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class model_kelolapengguna extends CI_Model {
    
    public function getAll()
    {
        $q = $this->db->query("SELECT * FROM tbl_pengguna ORDER BY p_createat asc");
        return $q;
    }

    public function totalTransaksi()
    {
        $q = $this->db->query("SELECT COUNT(tbl_transaksi.t_idtransaksi) FROM `tbl_pengguna` LEFT JOIN tbl_transaksi ON tbl_transaksi.t_idpengguna = tbl_pengguna.p_id WHERE tbl_transaksi.t_idpengguna = 15");
        return $q;
    }

    public function updatePengguna($id)
    {
        $q = $this->db->query("UPDATE tbl_pengguna SET p_verifikasi = 1 where p_id = $id");
        return $q;
    }

    public function deletePengguna($idpengguna)
    {
        $this->db->where('p_id', $idpengguna);
        $this->db->delete('tbl_pengguna');

    }

}
                        
/* End of file model_kelolapengguna.php */
    
                        