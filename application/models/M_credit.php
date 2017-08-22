<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_credit extends CI_Model {
	public function select_all_credit() {
		$sql = "SELECT * FROM credit";

		$data = $this->db->query($sql);

		return $data->result();
	}

	
	public function select_all() {
		$sql = " SELECT credit.id AS id, credit.bank_code AS bank_code, credit.bank_name AS bank_name FROM credit WHERE credit.id = id ";

		$data = $this->db->query($sql);

		return $data->result();
	}
	

	public function select_by_id($id) {
		$sql = "SELECT * FROM credit WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {

		$sql = "UPDATE credit SET bank_code='" .$data['bank_code'] ."', bank_name='" .$data['bank_name'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM credit WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$this->db->insert('credit', $data);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('credit', $data);
		
		return $this->db->affected_rows();
	}

	public function check_bank_name($bank_name) {
		$this->db->where('bank_name', $bank_name);
		$data = $this->db->get('credit');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('credit');

		return $data->num_rows();
	}
}

/* End of file M_credit.php */
/* Location: ./application/models/M_credit.php */