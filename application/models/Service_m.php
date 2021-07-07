<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_m extends CI_Model {

    public function get($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('serv_data');
        $this->db->join('user','user.user_id = serv_data.user_id');
        if($id != NULL){
            $this->db->where('service_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function addService($post)
    {
        $params = [
            'service_id' => $post['service_id'],
            'user_id' => $this->session->userdata('userid'),
            'customer' => $post['customer'],
            'no_telp' => $post['no_telp'],
            'perangkat' => $post['perangkat'],
            'keluhan' => $post['keluhan'],
        ];
        $this->db->insert('serv_data', $params);
    }

    public function edit($post)
    {
        $params = [
            'service_id' => $post['service_id'],
            'user_id' => $this->session->userdata('userid'),
            'customer' => $post['customer'],
            'no_telp' => $post['no_telp'],
            'perangkat' => $post['perangkat'],
            'keluhan' => $post['keluhan'],
            'status' => $post['status'],
            'keterangan' => $post['keterangan'],
            'harga' => $post['harga'],
            'jasa' => $post['jasa']
        ];
        $this->db->where('service_id', $post['service_id']);
        $this->db->update('serv_data', $params);
    }

    public function delete($id){
        $this->db->where('service_id',$id);
        $this->db->delete('serv_data');
    }

    public function getStatus($status)
    {
        $this->db->from('serv_data');
        $this->db->join('user','user.user_id = serv_data.user_id');
        $this->db->where('status',$status);
        $this->db->query("SELECT harga+jasa AS harga from serv_data");
        $query = $this->db->get();
        return $query;
    }
    
    public function updateStatus($id)
    {
        $params = [
            'status' => 'selesai'
        ];
        $this->db->where('service_id',$id);
        $this->db->update('serv_data',$params);
    }

    public function downdate($id)
    {
        $params = [
            'status' => 'proses'
        ];
        $this->db->where('service_id',$id);
        $this->db->update('serv_data',$params);
    }

}