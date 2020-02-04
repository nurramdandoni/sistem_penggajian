<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_admin');
		$this->load->library('pdf');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth()
	{

		$username = $this->input->post('username');
		$u = $this->input->post('password');
		$password = sha1($u);
		$aksi = $this->Model_admin->m_login($username,$password);
		if($aksi->num_rows()>0){
			$this->session->set_userdata('loginAuth', $username);

			print "<script>alert('Login Berhasil!');</script>";
			redirect(base_url('admin'));
		}else{
			print "<script>alert('Login Gagal!');</script>";
			$this->load->view('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		print "<script>alert('Logout Berhasil!');</script>";
			redirect(base_url('login'));
	}

}
