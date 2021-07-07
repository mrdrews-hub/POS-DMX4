<?php 

class Fungsi {

    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function userLogin()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    //jang dashboard
    public function countItem()
    {
        $this->ci->load->model('item_m');
        return $this->ci->item_m->get()->num_rows();
    }

    public function countSupplier()
    {
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    }

    public function countService()
    {
        $this->ci->load->model('service_m');
        return $this->ci->service_m->get()->num_rows();
    }
    public function countTrx()
    {
        $this->ci->load->model('sales_m');
        return $this->ci->sales_m->get()->num_rows();   
    }

}