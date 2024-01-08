<?php


class Transaksi extends CI_Controller {
	public function __construct() {
		parent::__construct();
		isLogin();
		$this->load->model("ModelTransaksi");
	}

	public function index() {
		$transaksi = $this->ModelTransaksi->getAll();
		$data = array(
			"header" => "Dashboard",
			"page" => "content/transaksi/v_list_transaksi",
			"transaksi" => $transaksi
		);
		$this->load->view("layout/main", $data);
	}
}
