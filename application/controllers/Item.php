<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model(['item_m','category_m','unit_m']);
        
    }


    function get_ajax() {

        $list = $this->item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode/'.$item->item_id).'" class="btn btn-default" id="btnbarcode" data-barcode='.$item->barcode.' data-toggle="modal" data-target="#ModalBarcode">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->nama_item;
            $row[] = $item->nama_category;
            $row[] = $item->nama_unit;
            $row[] = rupiah($item->price);
            $row[] = $item->stock;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                    <a href="'.site_url('item/delete?item_id='.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template','produk/item/item_data', $data);
	}

    public function add()
    {
        $item = new stdClass();
        $item->item_id = NULL;
        $item->barcode = NULL;
        $item->nama_item = NULL;
        $item->price = NULL;

        $query_category = $this->category_m->get();
        $category[NULL] = '- Pilih -';
        foreach($query_category->result() as $ctg){
            $category[$ctg->category_id] = $ctg->nama_category;
        }

        $query_unit = $this->unit_m->get();
        $unit[NULL] = '- Pilih -';
        foreach($query_unit->result() as $unt){
            $unit[$unt->unit_id] = $unt->nama_unit;
        }

        $data = array(
            'page' => 'add',
            'row' => $item,
            'category' => $category, 'selectedcategory' => NULL,
            'unit' => $unit, 'selectedunit' => NULL
        );
        $this->template->load('template','produk/item/item_add',  $data);
    }

    public function edit($id)
    {
        $query = $this->item_m->get($id);
        if($query->num_rows() > 0){
            $item = $query->row();

            $query_category = $this->category_m->get();
            $category[NULL] = '- Pilih -';
            foreach($query_category->result() as $ctg){
                $category[$ctg->category_id] = $ctg->nama_category;
            }

            $query_unit = $this->unit_m->get();
            $unit[NULL] = '- Pilih -';
            foreach($query_unit->result() as $unt){
                $unit[$unt->unit_id] = $unt->nama_unit;
            }
    
            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $category, 'selectedcategory' => $item->category_id,
                'unit' => $unit, 'selectedunit' => $item->unit_id,
            );
            $this->template->load('template','produk/item/item_add',  $data);
        }else{
            echo "<script>alert('Data Tidak Ditemukan!')
            window.location = '".site_url('user')."'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['add'])){
            if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0 ){
                $this->session->set_flashdata('error', "Barcode $post[barcode] Sudah Dipakai");
                redirect('item/add');
            }else{
                $this->item_m->add($post);
            }
        }else if(isset($_POST['edit'])){
            if($this->item_m->check_barcode($post['barcode'], $post['item_id'])->num_rows() > 0 ){
                $this->session->set_flashdata('error', "Barcode $post[barcode] Sudah Dipakai");
                redirect('item/edit/'.$post['item_id']);
            }else{
                $this->item_m->edit($post);
            }
        }

        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
        }
        redirect('item');
    }

	public function delete()
    {
        $id = $this->input->get('item_id');
        $this->item_m->delete($id);
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus!');
        }
        redirect('item');
    }

    function barcode($id){
		$data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template','produk/item/barcode', $data);
    }
}
