<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RStock_m extends CI_Model {

    public function view_by_date($date){
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->join('supplier','t_stock.supplier_id = supplier.supplier_id','left');
        $this->db->where('type','in');
        $this->db->where('DATE(date)', $date); // Tambahkan where tanggal nya
        
		return $this->db->get('t_stock')->result();// Tampilkan data t_stock sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->join('supplier','t_stock.supplier_id = supplier.supplier_id','left');
        $this->db->where('type','in');
        $this->db->where('MONTH(date)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(date)', $year); // Tambahkan where tahun
        
		return $this->db->get('t_stock')->result(); // Tampilkan data t_stock sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->join('supplier','t_stock.supplier_id = supplier.supplier_id','left');
        $this->db->where('type','in');
        $this->db->where('YEAR(date)', $year); // Tambahkan where tahun
        
		return $this->db->get('t_stock')->result(); // Tampilkan data t_stock sesuai tahun yang diinput oleh user pada filter
	}
    
	public function view_all(){
        $tgl = date('Y-m-d');
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->join('supplier','t_stock.supplier_id = supplier.supplier_id','left');
        $this->db->where('type','in');
        $this->db->where('date',$tgl);
		return $this->db->get('t_stock')->result(); // Tampilkan semua data t_stock
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(date) AS tahun'); // Ambil Tahun dari field date
        $this->db->from('t_stock'); // select ke tabel t_stock
        $this->db->where('type','in');
        $this->db->order_by('YEAR(date)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(date)'); // Group berdasarkan tahun pada field date
        
        return $this->db->get()->result(); // Ambil data pada tabel t_stock sesuai kondisi diatas
    }
}