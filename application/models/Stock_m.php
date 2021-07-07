<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {

    public function get($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('t_stock');
        if($id != NULL){
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id){
        $this->db->where('stock_id',$id);
        $this->db->delete('t_stock');
    }

    public function getStockIn()
    {
        $this->db->select('*');
        $this->db->from('t_stock');
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->join('supplier','t_stock.supplier_id = supplier.supplier_id','left');
        $this->db->where('type','in');
        $this->db->order_by('stock_id','desc');
        $query = $this->db->get();
        return $query;
    }

    public function getStockOut()
    {
        $this->db->select('*');
        $this->db->from('t_stock');
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->where('type','out');
        $this->db->order_by('stock_id','desc');
        $query = $this->db->get();
        return $query;
    }

    public function addStock($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? NULL : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid')

        ];
        $this->db->insert('t_stock', $params);
    }

    public function outStock($post)
    {
        $params = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid')

        ];
        $this->db->insert('t_stock', $params);
    }

}