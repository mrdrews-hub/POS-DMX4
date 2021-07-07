<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model(['item_m','service_m','sales_m']);
    }

    public function index()
    {
        $item = $this->item_m->get()->result();
        $service = $this->service_m->getStatus("proses")->result();    
        $invoice = $this->sales_m->invoice();
        $data = [
                    "item" => $item,
                    "service" => $service,
                    "invoice" => $invoice,
                ];
        $this->template->load('template','transaction/sales_data',$data);
        
    }

    public function add()
    {   

        $data = array(
            array(
                'id'      => $this->input->post('item_id'),
                'qty'     => $this->input->post('qty'),
                'price'   => $this->input->post('harga'),
                'name'    => $this->input->post('item'),
                "kode"    =>"item"
            ),
            array(
                'id'      => $this->input->post('service_id'),
                'qty'     => $this->input->post('qty'),
                'price'   => $this->input->post('harga'),
                'name'    => $this->input->post('item'),
                'kode'    => "service"
            )
    );
    $post = $this->input->post(NULL,TRUE);
    $id =   $this->input->post('item_id');
    $qty  = $this->input->post('qty');
    $stock = $this->item_m->get($id)->row()->stock;
    $service_id = $this->input->post('service_id');
        if(isset($_POST['submit'])){
            if($qty > $stock){
                $this->session->set_flashdata('stkeror','');
                redirect('sales');
            }else{
                $this->cart->insert($data);
                $this->item_m->updateStockOut($post);
                $this->service_m->updateStatus($service_id);
                redirect('sales');
            }           
        }
        if(isset($_POST['submitServ'])){
            $this->cart->insert($data);
            $this->service_m->updateStatus($service_id);
                redirect('sales');
        }
        

    }

    public function remove($rowid)
    {
        $qty = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $kode = $this->uri->segment(6);
        $data = [
            'qty' => $qty,
            'item_id' => $item_id
        ];
        if($kode == "item"){
            $this->item_m->updateStockIn($data);
            $this->cart->remove($rowid);
            redirect('sales');
        }else if($kode == "service"){
            $this->service_m->downdate($item_id);
            $this->cart->remove($rowid);
            redirect('sales');
        }
        
    }
    public function proses()
    {
        $i=0;
        $a= $this->input->post('item');
        $price= $this->input->post('price');
        $qty= $this->input->post('qty');
        $subtotal= $this->input->post('subtotal');
        $invoice = $this->sales_m->invoice();
        if($a[0] !== NULL){
            foreach ($a as $row){
                $data = [
                    'invoice' => $invoice,
                    'item' => $row,
                    'price' => $price[$i],
                    'qty' => $qty[$i],
                    'subtotal' => $subtotal[$i],
                ];
               $insert = $this->db->insert('penjualan',$data);
               if($insert){
                   $i++;
               }
            }
        }
        $post = $this->input->post(NULL,TRUE);
        $this->sales_m->proses($post);

        if($this->db->affected_rows() > 0 ){
                $datas["invoice"] = $invoice;
                // ob_start();
                $this->load->view('transaction/invoice',$datas);
                // $html = ob_get_contents();
                // ob_end_clean();
                // try{$mpdf = new \Mpdf\Mpdf();
                // $mpdf->WriteHTML($html);
                // $mpdf->Output('Data Transaksi.pdf', 'I');
                // }catch(\Mpdf\MpdfException $e){
                //     echo $e->getMessage();
                // }
                $this->cart->destroy();
        }

            
    }

    public function invoice()
    {
        $this->view->load("transaction/invoice");
    }


}