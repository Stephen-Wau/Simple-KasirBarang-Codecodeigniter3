<?php


class LoginModel extends CI_Model {

	public function cekUser($email, $password) {
		$syarat = array(
			"email_user" => $email,
//			"password_user" => $password
		);
		$this->db->where($syarat);
		$user = $this->db->get("users")->row();
		//cek error
		//1. Jika email tidak ditemukan
		if(!$user){
			return false;
		}
		$passwordUser = $user->password_user;
		//2.JIka password yang dimasukkan salah
		if(!password_verify($password,$passwordUser)){
			return false;
		}
		return $user;
	}
}
