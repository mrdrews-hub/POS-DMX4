<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category_m extends CI_Model {

    public function get($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('p_category');
        if($id != NULL){
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;

    }

    public function add($post){
        $params = [
            'nama_category' => $post['nama_category'],
        ];
        $this->db->insert('p_category', $params);
    }

    public function edit($post){
        $params = [
            'nama_category' => $post['nama_category'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['category_id']);
        $this->db->update('p_category', $params);
    }

    public function delete($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}