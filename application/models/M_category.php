<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model {
	public function select_all_category() {
		$sql = "SELECT * FROM category";

		$data = $this->db->query($sql);

		return $data->result();
	}

	
	public function select_all() {
		$sql = " SELECT category.id AS id, category.category_code AS category_code, category.category_name AS category_name, publish.status AS status FROM category, publish WHERE category.id_publish = publish.id ";

		$data = $this->db->query($sql);

		return $data->result();
	}
	

	public function select_by_id($id) {
		$sql = "SELECT * FROM category WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {

		$sql = "UPDATE category SET category_code='" .$data['category_code'] ."', category_name='" .$data['category_name'] ."', id_publish='" .$data['id_publish'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM category WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$this->db->insert('category', $data);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('category', $data);
		
		return $this->db->affected_rows();
	}

	public function check_category_name($category_name) {
		$this->db->where('category_name', $category_name);
		$data = $this->db->get('category');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('category');

		return $data->num_rows();
	}
}

/* End of file M_category.php */
/* Location: ./application/models/M_category.php */