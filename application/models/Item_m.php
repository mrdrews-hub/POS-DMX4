<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_m extends CI_Model {

        // start datatables
        var $column_order = array(null, 'barcode', 'p_item.nama_item', 'nama_category', 'nama_unit', 'price', 'stock'); //set column field database for datatable orderable
        var $column_search = array('barcode', 'p_item.nama_item', 'price'); //set column field database for datatable searchable
        var $order = array('item_id' => 'DESC'); // default order 
     
        private function _get_datatables_query() {
            $this->db->select('p_item.*, p_category.nama_category, p_unit.nama_unit');
            $this->db->from('p_item');
            $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
            $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
            $i = 0;
            foreach ($this->column_search as $item) { // loop column 
                if(@$_POST['search']['value']) { // if datatable send POST for search
                    if($i===0) { // first loop
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
                    if(count($this->column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }
             
            if(isset($_POST['order'])) { // here order processing
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }  else if(isset($this->order)) {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }
        function get_datatables() {
            $this->_get_datatables_query();
            if(@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }
        function count_filtered() {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        }
        function count_all() {
            $this->db->from('p_item');
            return $this->db->count_all_results();
        }
        // end datatables
    

    public function get($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('p_item');
        $this->db->join('p_category','p_category.category_id = p_item.category_id');
        $this->db->join('p_unit','p_unit.unit_id = p_item.unit_id');
        if($id != NULL){
            $this->db->where('item_id', $id);
        }
        $query = $this->db->get();
        return $query;

    }

    public function add($post){
        $params = [
            'barcode' => $post['barcode'],
            'nama_item' => $post['nama_item'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price']
        ];
        $this->db->insert('p_item', $params);
    }

    function check_barcode($code, $id = NULL){
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if($id != NULL){
            $this->db->where('item_id' != $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function edit($post){
        $params = [
            'barcode' => $post['barcode'],
            'nama_item' => $post['nama_item'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id', $post['item_id']);
        $this->db->update('p_item', $params);
    }


    public function delete($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    function updateStockIn($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $query = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($query);
    }

    function updateStockOut($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $query = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($query);
    }

    // function showStock(){
    //     $sql = "SELECT * FROM p_item WHERE stock <= 5";
    //     $this->db->join('p_category','p_category.category_id = p_item.category_id');
    //     $this->db->join('p_unit','p_unit.unit_id = p_item.unit_id');
    // }
    

}