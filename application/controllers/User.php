<?php


class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("UserModel");
		isLogin();
	}

	public function index() {
		$listUser = $this->UserModel->getAll();
		$data = array(
			"header" => "User",
			"page" => "content/user/v_list_user",
			"users" => $listUser
		);
		$this->load->view("layout/main", $data);
	}

	public function tambah() {
		$data = array(
			"header" => "User",
			"page" => "content/user/v_form_user",
		);
		$this->load->view("layout/main", $data);
	}

	public function proses_simpan() {
		$user = $this->input->post();
		$passwordRandom = randomPassword();
		$user["password_user"] = password_hash($passwordRandom,PASSWORD_DEFAULT);
		$user["is_active"] = 1;
		$user["first_login"] = 1;
		$this->UserModel->insert($user);
		$user["password_generated"] = $passwordRandom;
		sendEmail("Register",$user,"register");
		redirect("user");
	}

	public function reset_password() {
		//1. ambil parameter form
		$idUser = $this->input->post("id_user");
		//2. buat objek user
		$user = $this->UserModel->getByPrimaryKey($idUser);
		//3. buat random password
		$passwordRandom = randomPassword();
		//4. set random password ke objek user
		$user = (array) $user;
		$user["password_user"] = password_hash($passwordRandom,PASSWORD_DEFAULT);
		$user["first_login"] = 1;
		//5. simpan user
		$this->UserModel->update($idUser,$user);
		$user["password_generated"] = $passwordRandom;
		echo sendEmail("Reset Password",$user,"register");
	}
}
