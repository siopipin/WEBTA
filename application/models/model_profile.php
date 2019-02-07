<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class model_profile extends CI_Model {
                        
public function cekProfile($idpengguna){
    $que = $this->db->query("SELECT * FROM tbl_pengguna WHERE p_id = '$idpengguna'");
    return $que;
}

public function getFotoprofil($idpengguna)
{
    
    $q = $this->db->query("SELECT * FROM tbl_pengguna WHERE p_id = $idpengguna");
    return $q;
}


public function updatePengguna($idpengguna, $data)
{
    $this->db->where('p_id', $idpengguna);
    $this->db->update('tbl_pengguna', $data);
}


                        
}
                        
/* End of file model_profile.php */
    
                        