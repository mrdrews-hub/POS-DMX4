<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model(['service_m','user_m']);
    }

    public function service_data()
    {
        $data = [
            'row' => $this->service_m->get()
        ];
        $this->template->load('template','service/service_in/service_data',$data);
    }

    public function serviceIn_add()
    {   
        $service = new stdClass();
        $service->service_id = NULL;
        $service->kode_service = NULL;
        $service->customer = NULL;
        $service->no_telp = NULL;
        $service->perangkat = NULL;
        $service->keluhan = NULL;
        $service->status = NULL;
        $service->keterangan = NULL;
        $service->harga = NULL;
        $service->jasa = NULL;
        
        $data = [
            'page' => 'add',
            'row' => $service,
            'kodeServis' => $this->service_m->kodeServis()
        ];
        $this->template->load('template','service/service_in/service_add', $data);
    }

    public function edit($id){
        $query = $this->service_m->get($id);
        if($query->num_rows() > 0){
            $service = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $service,
            );
            $this->template->load('template','service/service_in/service_add', $data);
        }else{
            echo "<script>alert('Data Tidak Dserviceukan!')
            window.location = '".site_url('service')."'</script>";
        }
    }


    public function delete()
    {
        $id = $this->input->get('service_id');
        $this->service_m->delete($id);
        if($this->db->affected_rows() > 0 ){
            redirect('service/in');
        }
            
    }

    public function process()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['add'])){
            $this->service_m->addService($post);
        }else if(isset($_POST['edit'])){
            $this->service_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
            redirect('service/in');
            }   
    }

    public function cetakTiket()
    {
        $post = new stdClass();
        $post->customer = $this->input->post('customer',true);
        $post->perangkat = $this->input->post('perangkat',true);
        $post->notelp = $this->input->post('noTelp',true);
        $post->keluhan = $this->input->post('keluhan',true);
        $post->admin = $this->input->post('admin',true);
        $post->kodeServis = $this->input->post('kodeServis',true);
        $data = [
            'row' => $post
        ];
        $this->load->view('service/service_in/tiket.php',$data);
    }
}

