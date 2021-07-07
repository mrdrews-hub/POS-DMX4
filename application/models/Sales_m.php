<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_m extends CI_Model {

    public function get()
    {
        $tgl = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('t_detail');
        $this->db->where('tgl',$tgl);
        $query = $this->db->get();
        return $query;
    }

    public function invoice()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM penjualan 
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d",$n);
        }else{
            $no = "0001";
        }
        $invoice = "TR".date('ymd').$no;
        return $invoice;
    }

    public function proses($post)
    {
        $params = [
            'invoice' =>$post['invoice'],
            'kasir' => $this->fungsi->userLogin()->nama,
            'total' => $post['total'],
            'cash' => $post['bayar'],
            'kembalian' => $post['kembalian2']
        ];

        $this->db->insert('t_detail',$params);
    }


}
