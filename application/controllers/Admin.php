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
