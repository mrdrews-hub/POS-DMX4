<?php 

function islogin(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if($user_session){
        redirect('dashboard');
        }
}

function notlogin(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if(!$user_session){
        redirect('auth/login');
        }

function checkAdmin(){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->userLogin()->level != 1){
        redirect('dashboard');
    }
}

function rupiah($angka){
	
    $hasil_rupiah = "Rp" . number_format($angka,0,',','.');
    return $hasil_rupiah;
 
}

function indoDate($date){
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);

    return $d.'/'.$m.'/'.$y;
}


}