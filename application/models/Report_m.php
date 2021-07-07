<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {

    public function view_by_date($date){
        $this->db->where('DATE(created)', $date); // Tambahkan where tanggal nya
        
		return $this->db->get('penjualan')->result();// Tampilkan data penjualan sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
        $this->db->where('MONTH(created)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(created)', $year); // Tambahkan where tahun
        
		return $this->db->get('penjualan')->result(); // Tampilkan data penjualan sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
        $this->db->where('YEAR(created)', $year); // Tambahkan where tahun
        
		return $this->db->get('penjualan')->result(); // Tampilkan data penjualan sesuai tahun yang diinput oleh user pada filter
	}
    
	public function view_all(){
        $tgl = date('Y-m-d');
		return $this->db->query("SELECT * FROM penjualan WHERE created = '$tgl'")->result(); // Tampilkan semua data penjualan
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(created) AS tahun'); // Ambil Tahun dari field created
        $this->db->from('penjualan'); // select ke tabel penjualan
        $this->db->order_by('YEAR(created)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(created)'); // Group berdasarkan tahun pada field created
        
        return $this->db->get()->result(); // Ambil data pada tabel penjualan sesuai kondisi diatas
    }
    public function get_total()
    {
        $tgl = date('Y-m-d');
        $sql = "SELECT sum(subtotal) AS grandtotal from penjualan WHERE created = '$tgl'";
        return $this->db->query($sql);
    }
    public function get_total_day($date)
    {
        $sql = "SELECT sum(subtotal) AS grandtotal from penjualan WHERE DATE(created) = '$date'";
        return $this->db->query($sql);
    }
    public function get_total_bulan($month)
    {
        $sql = "SELECT sum(subtotal) AS grandtotal from penjualan WHERE MONTH(created) = '$month'";
        return $this->db->query($sql);
    }
    public function get_total_year($year)
    {
        $sql = "SELECT sum(subtotal) AS grandtotal from penjualan WHERE YEAR(created) = '$year'";
        return $this->db->query($sql);
    }
}