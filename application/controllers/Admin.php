<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->view('dashboard');
	}

	public function getDataKaryawan()
	{
		$this->load->view('data_karyawan');
	}

	public function getDataJabatan()
	{
		$this->load->view('data_jabatan');
	}
}
