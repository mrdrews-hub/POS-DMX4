<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model('supplier_m');
        
    }

	public function index()
	{
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template','supplier/supplier_data', $data);
	}

    public function add()
    {
        $supplier = new stdClass();
        $supplier->supplier_id = NULL;
        $supplier->nama_supplier = NULL;
        $supplier->no_telp = NULL;
        $supplier->alamat = NULL;
        $supplier->keterangan = NULL;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
        $this->template->load('template','supplier/supplier_add',  $data);
    }

    public function edit($id){
        $query = $this->supplier_m->get($id);
        if($query->num_rows() > 0){
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $this->template->load('template','supplier/supplier_add',  $data);
        }else{
            echo "<script>alert('Data Tidak Ditemukan!')
            window.location = '".site_url('supplier')."'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['add'])){
            $this->supplier_m->add($post);
        }else if(isset($_POST['edit'])){
            $this->supplier_m->edit($post);
        }

        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success','');
            redirect('supplier');
        }
    }

	public function delete()
    {
        $id = $this->input->get('supplier_id');
        $this->supplier_m->delete($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('dberror','');
        }else{
            $this->session->set_flashdata('delete','');
        }
      
            redirect('supplier');
        
    }
}
