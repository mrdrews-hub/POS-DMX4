<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {

    public function get($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('supplier');
        if($id != NULL){
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;

    }

    public function add($post)
    {
        $params = [
            'nama_supplier' => $post['nama_supplier'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'keterangan' => empty($post['keterangan']) ? null:$post['keterangan']
        ];
        $this->db->insert('supplier', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_supplier' => $post['nama_supplier'],
            'no_telp' => $post['no_telp'],
            'alamat' => $post['alamat'],
            'keterangan' => empty($post['keterangan']) ? null:$post['keterangan'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('supplier_id', $post['supplier_id']);
        $this->db->update('supplier', $params);
    }

    public function delete($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}