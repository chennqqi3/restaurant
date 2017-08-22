<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {
	public function select_all_product() {
		$sql = "SELECT * FROM product";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT product.id, product.product_code, product.product_name, category.category_name, product.price, product.description, product.picture, publish.status FROM product, category, publish WHERE product.id_category = category.id AND product.id_publish = publish.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	
	public function select_by_id($id) {
		$sql = "SELECT product.id AS id, product.product_code AS product_code, product.product_name AS product_name, product.id_category, product.price AS price, product.description AS description, product.picture AS picture, product.id_publish FROM product, category, publish WHERE product.id_category = category.id AND product.id_publish = publish.id AND product.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	

	public function select_by_category($id) {
		$sql = "SELECT COUNT(*) AS jml FROM product WHERE id_category = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE product SET product_code='" .$data['product_code'] ."', product_name='" .$data['product_name'] ."', id_category='" .$data['id_category'] ."', price='" .$data['price'] ."', description='" .$data['description'] ."', id_publish='" .$data['id_publish'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM product WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$this->db->insert('product', $data);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('product', $data);
		
		return $this->db->affected_rows();
	}

	public function check_product_name($product_name) {
		$this->db->where('product_name', $product_name);
		$data = $this->db->get('product');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('product');

		return $data->num_rows();
	}
}

/* End of file M_product.php */
/* Location: ./application/models/M_product.php */