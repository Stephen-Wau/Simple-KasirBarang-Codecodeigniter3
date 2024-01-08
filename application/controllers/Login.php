<?php


class Login extends CI_Controller {

	public function index() {
		$this->load->view("layout/login");
	}

	public function cekLogin() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$this->load->model("LoginModel");
		$user = $this->LoginModel->cekUser($email, $password);

		if (!$user) {
			redirect("login");
		} else {
			if ($user->is_active == "0") {
				redirect("login");
			}
			//
			if ($user->first_login == "1") {
				$this->session->set_userdata(array("id_user_pwl" => $user->id_user));
				redirect("login/firstLogin");
			}
			$dataSession = array(
				"id_user_pwl" => $user->id_user,
				"nama_user_pwl" => $user->nama_user,
				"role_user_pwl" => $user->role_user,
				"is_login_pwl" => true
			);

			$this->session->set_userdata($dataSession);
			redirect("dashboard");
		}
	}

	public function firstLogin() {
		$idUser = $this->session->userdata("id_user_pwl");
		if($idUser == null){
			redirect("login/logout");
		}
		$this->load->view("layout/first_login");
	}

	public function saveNewPassword() {
		$password = $this->input->post("password");
		$idUser = $this->session->userdata("id_user_pwl");
		$data = array(
			'password_user'=> password_hash($password,PASSWORD_DEFAULT),
			'first_login' => "0"
		);
		$this->load->model("UserModel");
		$this->UserModel->update($idUser,$data);
		$user = $this->UserModel->getByPrimaryKey($idUser);
		$dataSession = array(
			"id_user_pwl" => $user->id_user,
			"nama_user_pwl" => $user->nama_user,
			"role_user_pwl" => $user->role_user,
			"is_login_pwl" => true
		);
		$this->session->set_userdata($dataSession);
		redirect("dashboard");
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}
