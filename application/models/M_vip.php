<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vip extends CI_Model {
	public function select_all_vip() {
		$sql = "SELECT * FROM vip";

		$data = $this->db->query($sql);

		return $data->result();
	}

	
	public function select_all() {
		$sql = " SELECT vip.id AS id, vip.code AS code, vip.name AS name, vip.phone_number AS phone_number, vip.email AS email, vip.expired AS expired FROM vip WHERE vip.id = id ";

		$data = $this->db->query($sql);

		return $data->result();
	}
	

	public function select_by_id($id) {
		$sql = "SELECT * FROM vip WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {

		$sql = "UPDATE vip SET code='" .$data['code'] ."', name='" .$data['name'] ."', phone_number='" .$data['phone_number'] ."', email='" .$data['email'] ."', expired='" .$data['expired'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM vip WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$this->db->insert('vip', $data);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('vip', $data);
		
		return $this->db->affected_rows();
	}

	public function check_name($name) {
		$this->db->where('name', $name);
		$data = $this->db->get('vip');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('vip');

		return $data->num_rows();
	}
}

/* End of file M_vip.php */
/* Location: ./application/models/M_vip.php */