<?php


class ModelItemTransaksi extends CI_Model {
	var $table = "item_transaksi";
	var $primaryKey = "id_item_transaksi";

	public function insert($data) {
		return $this->db->insert($this->table, $data);
	}

	public function insertBatch($data) {
		return $this->db->insert_batch($this->table, $data);
	}

	public function getAll() {
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id) {
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data) {
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	// delete data
	public function delete($id) {
		//hanya mengupdate is_active dari 1 menjadi 0
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, array("is_active" => 0));
	}

}
