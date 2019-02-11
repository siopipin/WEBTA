<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_laporan extends CI_Model
{

    // Laporan Member
    public function optionTahun()
    {
        $q = $this->db->query("SELECT YEAR(p_createat) as tahun FROM tbl_pengguna GROUP BY YEAR(p_createat) ORDER BY YEAR(p_createat) ASC");
        return $q;
    }

    public function view_by_date($date)
    {
        $this->db->where('DATE(p_createat)', $date); // Tambahkan where tanggal nya

        return $this->db->get('tbl_pengguna')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user
    }

    public function view_by_month($month, $year)
    {
        $this->db->where('MONTH(p_createat)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(p_createat)', $year); // Tambahkan where tahun

        return $this->db->get('tbl_pengguna')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year)
    {
        $this->db->where('YEAR(p_createat)', $year); // Tambahkan where tahun

        return $this->db->get('tbl_pengguna')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all()
    {
        return $this->db->get('tbl_pengguna')->result(); // Tampilkan semua data transaksi
    }


    // Peminjaman

    public function optionTahunpinjam()
    {
        $q = $this->db->query("SELECT YEAR(t_tanggalpinjam) as tahun FROM tbl_transaksi GROUP BY YEAR(t_tanggalpinjam) ORDER BY YEAR(t_tanggalpinjam) ASC");
        return $q;
    }

    public function view_by_datepinjam($date)
    {
        $q = $this->db->query("SELECT * FROM tbl_transaksi
        LEFT JOIN tbl_pengguna
        ON tbl_transaksi.t_idpengguna = tbl_pengguna.p_id
        LEFT JOIN tbl_buku
        on tbl_transaksi.t_idbuku = tbl_buku.b_idbuku
        where date(tbl_transaksi.t_tanggalpinjam) = '$date'");
        return $q->result();


        // $this->db->where('DATE(t_tanggalpinjam)', $date); // Tambahkan where tanggal nya

        // return $this->db->get('tbl_transaksi')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user
    }

    public function view_by_monthpinjam($month, $year)
    {
        $q = $this->db->query("SELECT * FROM tbl_transaksi
        LEFT JOIN tbl_pengguna
        ON tbl_transaksi.t_idpengguna = tbl_pengguna.p_id
        LEFT JOIN tbl_buku
        on tbl_transaksi.t_idbuku = tbl_buku.b_idbuku
        where month(t_tanggalpinjam) = $month and year(t_tanggalpinjam) = $year
        ");
        return $q->result();

    }

    public function view_by_yearpinjam($year)
    {
        $this->db->where('YEAR(t_tanggalpinjam)', $year); // Tambahkan where tahun

        return $this->db->get('tbl_transaksi')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }

    public function view_allpinjam()
    {
        $q = $this->db->query("SELECT * FROM tbl_transaksi
        LEFT JOIN tbl_pengguna
        ON tbl_transaksi.t_idpengguna = tbl_pengguna.p_id
        LEFT JOIN tbl_buku
        on tbl_transaksi.t_idbuku = tbl_buku.b_idbuku");
        return $q->result();
    }


        // Laporan Buku
        public function optionTahunbuku()
        {
            $q = $this->db->query("SELECT YEAR(b_tanggalsimpan) as tahun FROM tbl_buku GROUP BY YEAR(b_tanggalsimpan) ORDER BY YEAR(b_tanggalsimpan) ASC");
            return $q;
        }
    
        public function view_by_datebuku($date)
        {
            $this->db->where('DATE(b_tanggalsimpan)', $date); // Tambahkan where tanggal nya
    
            return $this->db->get('tbl_buku')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user
        }
    
        public function view_by_monthbuku($month, $year)
        {
            $this->db->where('MONTH(b_tanggalsimpan)', $month); // Tambahkan where bulan
            $this->db->where('YEAR(b_tanggalsimpan)', $year); // Tambahkan where tahun
    
            return $this->db->get('tbl_buku')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }
    
        public function view_by_yearbuku($year)
        {
            $this->db->where('YEAR(b_tanggalsimpan)', $year); // Tambahkan where tahun
    
            return $this->db->get('tbl_buku')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    
        public function view_allbuku()
        {
            return $this->db->get('tbl_buku')->result(); // Tampilkan semua data transaksi
        }
    
}

/* End of file model_laporan.php */
