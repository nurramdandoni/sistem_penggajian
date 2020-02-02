<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// $this->db2=$this->load->database('sttba789_elearning',TRUE);
		// $this->load->helper('tanggal_helper');
		// $this->load->library('pdf');
		// $this->load->library('ciqrcode'); //pemanggilan library QR CODE');
		$this->load->model('Model_admin');
	}

	public function index()
	{
		
		$this->load->view('dashboard');
	}

	public function getDataKaryawan()
	{
		$data['karyawan'] = $this->Model_admin->m_getDataKaryawan();
		$this->load->view('data_karyawan',$data);
	}

	public function getDataJabatan()
	{
		$data['jabatan'] = $this->Model_admin->m_getDataJabatan();
		$this->load->view('data_jabatan',$data);
	}

	public function getDataGaji()
	{
		$this->load->view('data_gaji');
	}

	public function getDataBonus()
	{
		$this->load->view('data_bonus');
	}

	public function getDataLembur()
	{
		$this->load->view('data_lembur');
	}

	public function getDataShift()
	{
		$this->load->view('data_shift');
	}

	public function getDataListAbsensi()
	{
		$this->load->view('data_absensi');
	}

	public function exportimportAbsensi()
	{
		$this->load->view('export_import_absensi');
	}

	public function getDataInvoice()
	{
		$this->load->view('data_invoice');
	}

	public function getLaporanInvoice()
	{
		$this->load->view('data_laporan_invoice');
	}
}
