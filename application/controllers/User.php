<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        notlogin();
        checkAdmin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }

	public function index()
	{

        $data['row'] = $this->user_m->get();
		$this->template->load('template','user/user_data',$data);
	}
    
    public function add()
    {
        
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('username','Username','required|min_length[4]|is_unique[user.username]',
        array(  'is_unique' => '%s Sudah ada !')
        );
        $this->form_validation->set_rules('password','password','required|min_length[4]');
        $this->form_validation->set_rules('passconf','Password Konfirmasi','matches[password]',
        array(  'matches' => '%s Tidak Sesuai !')    
        );
        $this->form_validation->set_rules('level','Level','required');
        $this->form_validation->set_message('required','%s Tidak Boleh Kosong!');
        $this->form_validation->set_message('min_length','{field} Minimal 4 karakter !');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template','user/user_add');
        }
        else{
                $post = $this->input->post(NULL, TRUE);
                $this->user_m->add($post);
                if($this->db->affected_rows() > 0 ){
                    $this->session->set_flashdata('success','');
                }
                redirect('user');
        }
        
    }


    public function delete()
    {
        $id = $this->input->get('user_id');
        $this->user_m->delete($id);
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('delete','');;
        }
            redirect('user');
    }


    public function edit($id)
    {
        
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('username','Username','required|min_length[4]|callback_username_check',
        array(  'is_unique' => '%s Sudah ada !')
        );
        if($this->input->post('password')){
            $this->form_validation->set_rules('password','password','min_length[4]');
            $this->form_validation->set_rules('passconf','Password Konfirmasi','matches[password]',
            array(  'matches' => '%s Tidak Sesuai !')    
            );
        }
        if($this->input->post('passconf')){
            $this->form_validation->set_rules('passconf','Password Konfirmasi','matches[password]',
            array(  'matches' => '%s Tidak Sesuai !')    
            );
        }

        $this->form_validation->set_rules('level','Level','required');
        $this->form_validation->set_message('required','%s Tidak Boleh Kosong!');
        $this->form_validation->set_message('min_length','{field} Minimal 4 karakter !');

        if ( $this->form_validation->run() == FALSE ) {
            $query = $this->user_m->get($id);
            if($query->num_rows() > 0){
                $data['row'] = $query->row();
                $this->template->load('template','user/user_edit',$data);
            }else{
                echo "<script>alert('Data Tidak Ditemukan!')
                        window.location = '".site_url('user')."'</script>";
            }

        }
        else{
                $post = $this->input->post(NULL, TRUE);
                $this->user_m->edit($post);
                if($this->db->affected_rows() > 0 ){
                    $this->session->set_flashdata('success','');
                }
                    redirect('user');
        }
        
    }
    function username_check(){
        $post = $this->input->post(NULL, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username ='$post[username]' AND user_id != '$post[user_id]'");

        if($query->num_rows() > 0 ){
            $this->form_validation->set_message('username_check','{field} Sudah Dipakai!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
