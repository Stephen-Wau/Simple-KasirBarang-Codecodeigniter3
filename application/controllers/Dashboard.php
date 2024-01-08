<?php


class Dashboard extends CI_Controller {
	public function index() {
		isLogin();
		$data = array(
			"header" => "Dashboard",
			"page" => "dashboard"
		);
		$this->load->view("layout/main", $data);
	}
}
