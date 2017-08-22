<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credit extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_credit');
		//$this->load->model('M_posisi');
		//$this->load->model('M_kota');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataCredit'] = $this->M_credit->select_all();
		//$data['dataPosisi'] = $this->M_posisi->select_all();
		//$data['dataKota'] = $this->M_kota->select_all();

		$data['page'] = "credit";
		$data['judul'] = "Data Credit";
		$data['deskripsi'] = "Manage Data Credit";

		$data['modal_tambah_credit'] = show_my_modal('modals/modal_tambah_credit', 'tambah-credit', $data);

		$this->template->views('credit/home', $data);
	}

	public function tampil() {
		$data['dataCredit'] = $this->M_credit->select_all();
		$this->load->view('credit/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('bank_code', 'Bank Code', 'trim|required');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
		
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_credit->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Credit Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Credit Gagal ditambahkan', '20px');
			}

		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataCredit'] 	= $this->M_credit->select_by_id($id);

		echo show_my_modal('modals/modal_update_credit', 'update-credit', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('bank_code', 'Bank Code', 'trim|required');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_credit->update($data);
		
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Credit Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Credit Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}


		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_credit->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Credit Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Credit Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_credit->select_all_credit();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Nomor Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "ID Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "ID Kelamin");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "ID Posisi");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Status");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_kota); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->id_kelamin); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->id_posisi); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->status); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Credit.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Credit.xlsx', NULL);
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
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_credit->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['telp'] = $value['C'];
							$resultData[$index]['id_kota'] = $value['D'];
							$resultData[$index]['id_kelamin'] = $value['E'];
							$resultData[$index]['id_posisi'] = $value['F'];
							$resultData[$index]['status'] = $value['G'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_credit->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Credit Berhasil diimport ke database'));
						redirect('Credit');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Credit Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Credit');
				}

			}
		}
	}
}

/* End of file Credit.php */
/* Location: ./application/controllers/Credit.php */