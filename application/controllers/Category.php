<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model('category_m');
        
    }

	public function index()
	{
		$data['row'] = $this->category_m->get();
		$this->template->load('template','produk/category/category_data', $data);
	}

    public function add(){
        $category = new stdClass();
        $category->category_id = NULL;
        $category->nama_category = NULL;
        $data = array(
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template','produk/category/category_add',  $data);
    }

    public function edit($id){
        $query = $this->category_m->get($id);
        if($query->num_rows() > 0){
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template','produk/category/category_add',  $data);
        }else{
            echo "<script>alert('Data Tidak Ditemukan!')
            window.location = '".site_url('user')."'</script>";
        }
    }

    public function process(){
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['add'])){
            $this->category_m->add($post);
        }else if(isset($_POST['edit'])){
            $this->category_m->edit($post);
        }

        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
        }
        redirect('category');
    }

	public function delete()
    {
        $id = $this->input->get('category_id');
        $this->category_m->delete($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('dberror','');
        }else{
            $this->session->set_flashdata('delete','');
        } redirect('category');
        
    }
}
