<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit_m extends CI_Model {

    public function get($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('p_unit');
        if($id != NULL){
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;

    }

    public function add($post){
        $params = [
            'nama_unit' => $post['nama_unit'],
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post){
        $params = [
            'nama_unit' => $post['nama_unit'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['unit_id']);
        $this->db->update('p_unit', $params);
    }

    public function delete($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}