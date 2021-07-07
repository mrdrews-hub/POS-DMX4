<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model('unit_m');
        
    }

	public function index()
	{
		$data['row'] = $this->unit_m->get();
		$this->template->load('template','produk/unit/unit_data', $data);
	}

    public function add(){
        $unit = new stdClass();
        $unit->unit_id = NULL;
        $unit->nama_unit = NULL;
        $data = array(
            'page' => 'add',
            'row' => $unit
        );
        $this->template->load('template','produk/unit/unit_add',  $data);
    }

    public function edit($id){
        $query = $this->unit_m->get($id);
        if($query->num_rows() > 0){
            $unit = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $unit
            );
            $this->template->load('template','produk/unit/unit_add',  $data);
        }else{
            echo "<script>alert('Data Tidak Ditemukan!')
            window.location = '".site_url('user')."'</script>";
        }
    }

    public function process(){
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['add'])){
            $this->unit_m->add($post);
        }else if(isset($_POST['edit'])){
            $this->unit_m->edit($post);
        }

        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
        }
        redirect('unit');
    }

	public function delete()
    {
        $id = $this->input->get('unit_id');
        $this->unit_m->delete($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('dberror','');
        }else{
            $this->session->set_flashdata('delete','');
        }
        redirect('unit');
    }
}
