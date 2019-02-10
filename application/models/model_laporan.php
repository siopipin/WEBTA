<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_laporan extends CI_Model
{

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

}

/* End of file model_laporan.php */
