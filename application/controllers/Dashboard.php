<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
	{
		notlogin();
		$sql = "SELECT * FROM p_item INNER JOIN p_category ON p_category.category_id = p_item.category_id WHERE stock <=5";	
		$data["row"] = $this->db->query($sql);
		$this->template->load('template','dashboard',$data);
	}
}

