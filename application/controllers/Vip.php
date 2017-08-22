<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vip extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_vip');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataVip'] 	= $this->M_vip->select_all();

		$data['page'] 		= "vip";
		$data['judul'] 		= "Data Vip";
		$data['deskripsi'] 	= "Manage Data Vip";

		$data['modal_tambah_vip'] = show_my_modal('modals/modal_tambah_vip', 'tambah-vip', $data);

		$this->template->views('vip/home', $data);
	}

	public function tampil() {
		$data['dataVip'] = $this->M_vip->select_all();
		$this->load->view('vip/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('code', 'Vip Code', 'trim|required');
		$this->form_validation->set_rules('name', 'Vip Name', 'trim|required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_vip->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Vip Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Vip Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {

		$id 				= trim($_POST['id']);
		$data['dataVip'] 	= $this->M_vip->select_by_id($id);
		$data['userdata'] 	= $this->userdata;
		
		echo show_my_modal('modals/modal_update_vip', 'update-vip', $data);

	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('code', 'Vip Code', 'trim|required');
		$this->form_validation->set_rules('name', 'Vip Name', 'trim|required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_vip->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Vip Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Vip Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_vip->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Vip Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Vip Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['vip'] = $this->M_vip->select_by_id($id);
		$data['jumlahVip'] = $this->M_vip->total_rows();
		$data['dataVip'] = $this->M_vip->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_vip', 'detail-vip', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_vip->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Vip");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Vip.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Vip.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_vip->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_vip->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Vip Berhasil diimport ke database'));
						redirect('Vip');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Vip Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Vip');
				}

			}
		}
	}
}

/* End of file Vip.php */
/* Location: ./application/controllers/Vip.php */