<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model(['item_m','supplier_m','stock_m']);
    }

    public function stockIn_data()
    {
        $data['row'] = $this->stock_m->getStockIn()->result();
        $this->template->load('template','transaction/StockIn/stockIn_data',$data);
    }

    public function stockIn_add()
    {
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = [
            "item" => $item,
            "supplier" => $supplier
        ];
        $this->template->load('template','transaction/StockIn/stockIn_add',$data);
    }

    
    public function stockIn_delete()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = [
            'qty' => $qty,
            'item_id' => $item_id
        ];

        $this->item_m->updateStockOut($data);
        $this->stock_m->delete($stock_id);
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
        }
        redirect('stock/in');
    }

    public function stockOut_data()
    {
        $data['row'] = $this->stock_m->getStockOut()->result();
        $this->template->load('template','transaction/StockOut/stockOut_data',$data);
    }  

    public function stockOut_add()
    {
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = [
            "item" => $item,
            "supplier" => $supplier
        ];
        $this->template->load('template','transaction/StockOut/stockOut_add',$data);
    }

    public function stockOut_delete()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = [
            'qty' => $qty,
            'item_id' => $item_id
        ];

        $this->item_m->updateStockIn($data);
        $this->stock_m->delete($stock_id);
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
        }
        redirect('stock/out');
    }


    public function process()
    {
        if(isset($_POST['in_add'])){
            $post = $this->input->post(NULL, TRUE);
            $this->stock_m->addStock($post);
            $this->item_m->updateStockIn($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
            }
            redirect('stock/in');
        }else if (isset($_POST['out_add'])){
            $post = $this->input->post(NULL, TRUE);
            $this->stock_m->outStock($post);
            $this->item_m->updateStockOut($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', '');
            }
            redirect('stock/out');
        }
    }

}