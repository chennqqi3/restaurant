<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_debit extends CI_Model {
	public function select_all_debit() {
		$sql = "SELECT * FROM debit";

		$data = $this->db->query($sql);

		return $data->result();
	}

	
	public function select_all() {
		$sql = " SELECT debit.id AS id, debit.bank_code AS bank_code, debit.bank_name AS bank_name FROM debit WHERE debit.id = id ";

		$data = $this->db->query($sql);

		return $data->result();
	}
	

	public function select_by_id($id) {
		$sql = "SELECT * FROM debit WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	/*
	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM debit WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM debit WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}
	*/

	public function update($data) {

		$sql = "UPDATE debit SET bank_code='" .$data['bank_code'] ."', bank_name='" .$data['bank_name'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM debit WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$this->db->insert('debit', $data);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('debit', $data);
		
		return $this->db->affected_rows();
	}

	public function check_bank_name($bank_name) {
		$this->db->where('bank_name', $bank_name);
		$data = $this->db->get('debit');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('debit');

		return $data->num_rows();
	}
}

/* End of file M_debit.php */
/* Location: ./application/models/M_debit.php */