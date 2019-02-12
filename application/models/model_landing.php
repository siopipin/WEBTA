<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_landing extends CI_Model
{
    public function bukuTerbaru()
    {
        $this->db->order_by('tbl_buku.b_tanggalsimpan desc');
        return $this->db->get('tbl_buku');
    }

    public function cekBuku($idbuku)
    {
        $this->db->where("b_idbuku", $idbuku);
        return $this->db->get('tbl_buku');
    }

    public function telusuri($query)
    {
        $this->db->select("*");
        $this->db->from("tbl_buku");
        if ($query != '') {
            $this->db->like('b_judul', $query);
            $this->db->or_like('b_pengarang', $query);
            $this->db->or_like('b_penerbit', $query);
            $this->db->or_like('b_tahunterbit', $query);
            $this->db->or_like('b_bahasa', $query);
            $this->db->or_like('b_klasifikasi', $query);
        }
        $this->db->order_by('b_idbuku', 'DESC');
        return $this->db->get();
    }

    public function getKlasifikasi()
    {
        $this->db->group_by('b_klasifikasi');
        $this->db->order_by('tbl_buku.b_klasifikasi asc');
        return $this->db->get('tbl_buku');
    }
    

    public function getPengarang()
    {
        $this->db->group_by('b_pengarang');
        $this->db->order_by('tbl_buku.b_pengarang asc');
        return $this->db->get('tbl_buku');
    }

    // Tampilkan semua buku dengan pagination
    public function hitungBuku()
    {
        return $this->db->count_all("tbl_buku");
    }

    public function hitungKategori()
    {
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");       
        $query2 = $mysqli->query("SELECT * from tbl_buku");
        $klasifikasi = array();
        while($data = $query2->fetch_assoc()){
            $tmp = $data['b_klasifikasi'];
            $indeks = array_search($tmp,$klasifikasi); 
            if($indeks===false){
                array_push($klasifikasi, $tmp);
            }
        }
        $count = sizeof($klasifikasi);
        return $count;
    }

    public function tampilBuku($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('tbl_buku.b_tanggalsimpan asc');
        $query = $this->db->get("tbl_buku");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //tampilkan semua kategori
    public function tampilKlasifikasi($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->group_by('b_klasifikasi');
        $this->db->order_by('tbl_buku.b_klasifikasi asc');
        $query = $this->db->get("tbl_buku");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    // Tampilkan semua buku dengan pagination
    public function hitungBukuklasifikasi($klasifikasi)
    {
        $this->db->select('b_klasifikasi');
        $this->db->where('b_klasifikasi', $klasifikasi);
        $q = $this->db->get('tbl_buku');
        $count = $q->result();
        return count($count);

    }

    public function tampilBukuklasifikasi($limit, $start, $klasifikasi)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('tbl_buku.b_judul asc');
        $this->db->where("b_klasifikasi", $klasifikasi);
        $query = $this->db->get("tbl_buku");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function cekKategorirekayasa()
    {
        $this->db->where("b_klasifikasi", 'rekayasa');
        return $this->db->get('tbl_buku');
    }
    public function cekKategoriilmukom()
    {
        $this->db->select('b_klasifikasi');
        $this->db->like("b_klasifikasi", 'Ilmu Komputer');
        return $this->db->get('tbl_buku');
    }

    public function cekKategoriinternet()
    {
        $this->db->select('b_klasifikasi');
        $this->db->like("b_klasifikasi", 'internet');
        return $this->db->get('tbl_buku');
    }
    
    public function cekKategorioffice()
    {
        $this->db->select('b_klasifikasi');
        $this->db->like("b_klasifikasi", 'office');
        return $this->db->get('tbl_buku');
    }
    
    public function insertPesan($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    public function pesan()
    {
        $q = $this->db->query("SELECT * FROM tbl_pesan WHERE pe_status= 0 ORDER BY pe_tanggal DESC");
        return $q;
    }

    public function hitungpesan()
    {
        $q = $this->db->query("SELECT COUNT(pe_id) AS jumlah FROM tbl_pesan WHERE pe_status = 0");
        return $q;
        
    }
}

/* End of file model_landing.php */
