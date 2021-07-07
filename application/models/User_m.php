<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();

        return $query;
    }

    public function get($id = NULL)
    {
        $this->db->select('*');
        $this->db->from('user');
        if($id != NULL){
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;

    }

    public function add($post)
    {
        $params['nama'] = $post['nama'];
        $params['username'] = $post['username'];
        $params['password'] = sha1( $post['password'] );
        $params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : NULL;
        $params['level'] = $post['level'];

        $this->db->insert('user',$params);
    }

    public function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }
    
    public function edit($post)
    {
        $params['nama'] = $post['nama'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1( $post['password'] );
        }
        $params['alamat'] = $post['alamat'] != "" ? $post['alamat'] : NULL;
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user',$params);
    }
}