<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_product');
		$this->load->model('M_category');
		$this->load->model('M_vip');
	}

	public function index() {
		$data['jml_product'] 	= $this->M_product->total_rows();
		$data['jml_category'] 	= $this->M_category->total_rows();
		$data['jml_vip'] 		= $this->M_vip->total_rows();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		$category = $this->M_category->select_all();
		$index = 0;
		foreach ($category as $value) {
		    $color = '#' .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)];

			$product_by_category = $this->M_product->select_by_category($value->id);

			$data_category[$index]['value'] = $product_by_category->jml;
			$data_category[$index]['color'] = $color;
			$data_category[$index]['highlight'] = $color;
			$data_category[$index]['label'] = $value->category_name;
			
			$index++;
		}

		/*
		$vip = $this->M_vip->select_all();
		$index = 0;
		foreach ($vip as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$product_by_vip = $this->M_product->select_by_vip($value->id);

			$data_vip[$index]['value'] = $product_by_vip->jml;
			$data_vip[$index]['color'] = $color;
			$data_vip[$index]['highlight'] = $color;
			$data_vip[$index]['label'] = $value->name;
			
			$index++;
		}
		*/

		$data['data_category'] = json_encode($data_category);
		//$data['data_vip'] = json_encode($data_vip);

		$data['page'] 			= "home";
		$data['judul'] 			= "Dashboard";
		$data['deskripsi'] 		= "Manage Data";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */