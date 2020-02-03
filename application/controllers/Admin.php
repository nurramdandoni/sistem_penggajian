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
		$this->load->library('pdf');
	}

	public function index()
	{
		
		$this->load->view('dashboard');
	}

	public function getDataKaryawan()
	{
		$data['akhir'] = $this->Model_admin->lastNIKKaryawan();
		$new = '';
		foreach($data['akhir']->result() as $ls){
			$new = substr($ls->NIK,4);
		}
		

		$data['lastNIK'] = 'STTB'.($new+1);
		$data['karyawan'] = $this->Model_admin->m_getDataKaryawan();
		$data['divisi'] = $this->Model_admin->m_getDataDivisi();
		$data['jabatan'] = $this->Model_admin->m_getDataJabatan();
		$this->load->view('data_karyawan',$data);
	}

	public function insertKaryawan(){
		$nik = $this->input->post('nik');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$id_divisi = $this->input->post('id_divisi');
		$id_jabatan = $this->input->post('id_jabatan');
		$tanggal_masuk = $this->input->post('tanggal_rec');

		$data = array(
			'NIK' => $nik,
			'nama_karyawan' => $nama_karyawan,
			'id_divisi' => $id_divisi,
			'id_jabatan' => $id_jabatan,
			'tanggal_masuk' => $tanggal_masuk
		);

		$aksi = $this->Model_admin->insertdataArray($data,'karyawan');
		if($aksi){

			print "<script>alert('Data Berhasil Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function updateKaryawan(){
		$nik = $this->input->post('nik');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$id_divisi = $this->input->post('id_divisi');
		$id_jabatan = $this->input->post('id_jabatan');
		$tanggal_masuk = $this->input->post('tanggal_rec');

		$data = array(
			'nama_karyawan' => $nama_karyawan,
			'id_divisi' => $id_divisi,
			'id_jabatan' => $id_jabatan,
			'tanggal_masuk' => $tanggal_masuk
		);
		$where = array(
			'NIK' => $nik
		);

		$aksi = $this->Model_admin->updatedataArray($where, $data, 'karyawan');

		if($aksi){

			print "<script>alert('Data Berhasil Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function deleteKaryawan(){
		$where = $this->uri->segment(3);
		$this->Model_admin->delete($where,'NIK','karyawan');
		print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
		exit();
	}

	public function getDataJabatan()
	{
		$data['divisi'] = $this->Model_admin->m_getDataDivisi();
		$data['jabatan'] = $this->Model_admin->m_getDataJabatan();
		$this->load->view('data_jabatan',$data);
	}

	public function insertJabatan(){
		$nama_jabatan = $this->input->post('nama_jabatan');
		$id_divisi = $this->input->post('id_divisi');
		$masa_jabatan = $this->input->post('masa_jabatan');
		$masa_promosi = $this->input->post('promosi_jabatan');

		$data = array(
			'nama_jabatan' => $nama_jabatan,
			'id_divisi' => $id_divisi,
			'masa_jabatan' => $masa_jabatan,
			'masa_promosi' => $masa_promosi
		);

		$aksi = $this->Model_admin->insertdataArray($data,'jabatan');
		if($aksi){

			print "<script>alert('Data Berhasil Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function updateJabatan(){
		$id_jabatan = $this->input->post('id_jabatan');
		$nama_jabatan = $this->input->post('nama_jabatan');
		$id_divisi = $this->input->post('id_divisi');
		$masa_jabatan = $this->input->post('masa_jabatan');
		$masa_promosi = $this->input->post('promosi_jabatan');

		$data = array(
			'nama_jabatan' => $nama_jabatan,
			'id_divisi' => $id_divisi,
			'masa_jabatan' => $masa_jabatan,
			'masa_promosi' => $masa_promosi
		);

		$where = array(
			'id' => $id_jabatan
		);

		$aksi = $this->Model_admin->updatedataArray($where, $data, 'jabatan');
		if($aksi){

			print "<script>alert('Data Berhasil Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}
	
	public function deleteJabatan(){
		$where = $this->uri->segment(3);
		$this->Model_admin->delete($where,'id','jabatan');
		print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
		exit();
	}

	public function getDataGaji()
	{
		$data['jabatan'] = $this->Model_admin->m_getDataJabatan();
		$data['gaji'] = $this->Model_admin->m_getDataGaji();
		$this->load->view('data_gaji',$data);
	}

	public function insertGaji(){
		$id_jabatan = $this->input->post('id_jabatan');
		$gaji = $this->input->post('gaji_jabatan');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_jabatan' => $id_jabatan,
			'gaji' => $gaji,
			'keterangan' => $keterangan
		);

		$aksi = $this->Model_admin->insertdataArray($data,'gaji');
		if($aksi){

			print "<script>alert('Data Berhasil Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function updateGaji(){
		$id_gaji = $this->input->post('id_gaji');
		$id_jabatan = $this->input->post('id_jabatan');
		$gaji = $this->input->post('gaji_jabatan');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_jabatan' => $id_jabatan,
			'gaji' => $gaji,
			'keterangan' => $keterangan
		);

		$where = array(
			'id' => $id_gaji
		);

		$aksi = $this->Model_admin->updatedataArray($where, $data, 'gaji');
		if($aksi){

			print "<script>alert('Data Berhasil Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

		
	public function deleteGaji(){
		$where = $this->uri->segment(3);
		$this->Model_admin->delete($where,'id','gaji');
		print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
		exit();
	}

	public function getDataBonus()
	{
		$data['bonus'] = $this->Model_admin->m_getDataBonus();
		$this->load->view('data_bonus',$data);
	}
	
	public function insertBonus(){
		$nama_bonus = $this->input->post('nama_bonus');
		$insentif = $this->input->post('insentif');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama_bonus' => $nama_bonus,
			'insentif' => $insentif,
			'keterangan' => $keterangan
		);

		$aksi = $this->Model_admin->insertdataArray($data,'bonus');
		if($aksi){

			print "<script>alert('Data Berhasil Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function updateBonus(){
		$id_bonus = $this->input->post('id_bonus');
		$nama_bonus = $this->input->post('nama_bonus');
		$insentif = $this->input->post('insentif');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama_bonus' => $nama_bonus,
			'insentif' => $insentif,
			'keterangan' => $keterangan
		);

		$where = array(
			'id' => $id_bonus
		);

		$aksi = $this->Model_admin->updatedataArray($where, $data, 'bonus');
		if($aksi){

			print "<script>alert('Data Berhasil Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

		
	public function deleteBonus(){
		$where = $this->uri->segment(3);
		$this->Model_admin->delete($where,'id','bonus');
		print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
		exit();
	}

	public function getDataLembur()
	{
		$data['shift'] = $this->Model_admin->m_getDataShift();
		$data['lembur'] = $this->Model_admin->m_getDataLembur();
		$this->load->view('data_lembur',$data);
	}

	public function insertLembur(){
		$id_shift = $this->input->post('id_shift');
		$jenis_lembur = $this->input->post('jenis_lembur');
		$satuan = $this->input->post('satuan');
		$insentif = $this->input->post('insentif');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_shift' => $id_shift,
			'nama_lembur' => $jenis_lembur,
			'satuan' => $satuan,
			'insentif' => $insentif,
			'keterangan' => $keterangan
		);

		$aksi = $this->Model_admin->insertdataArray($data,'lembur');
		if($aksi){

			print "<script>alert('Data Berhasil Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function updateLembur(){
		$id_lembur = $this->input->post('id_lembur');
		$id_shift = $this->input->post('id_shift');
		$jenis_lembur = $this->input->post('jenis_lembur');
		$satuan = $this->input->post('satuan');
		$insentif = $this->input->post('insentif');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_shift' => $id_shift,
			'nama_lembur' => $jenis_lembur,
			'satuan' => $satuan,
			'insentif' => $insentif,
			'keterangan' => $keterangan
		);

		$where = array(
			'id' => $id_lembur
		);

		$aksi = $this->Model_admin->updatedataArray($where, $data, 'lembur');
		if($aksi){

			print "<script>alert('Data Berhasil Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function deleteLembur(){
		$where = $this->uri->segment(3);
		$this->Model_admin->delete($where,'id','lembur');
		print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
		exit();
	}

	public function getDataShift()
	{
		$data['shift'] = $this->Model_admin->m_getDataShift();
		$this->load->view('data_shift',$data);
	}

	public function insertShift(){
		$nama_shift = $this->input->post('nama_shift');
		$jammasuk = $this->input->post('jammasuk');
		$jamkeluar = $this->input->post('jamkeluar');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama_shift' => $nama_shift,
			'jam_awal' => $jammasuk,
			'jam_akhir' => $jamkeluar,
			'keterangan' => $keterangan
		);

		$aksi = $this->Model_admin->insertdataArray($data,'shift');
		if($aksi){

			print "<script>alert('Data Berhasil Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Ditambahkan!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function updateShift(){
		$id_shift = $this->input->post('id_shift');
		$nama_shift = $this->input->post('nama_shift');
		$jammasuk = $this->input->post('jammasuk');
		$jamkeluar = $this->input->post('jamkeluar');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama_shift' => $nama_shift,
			'jam_awal' => $jammasuk,
			'jam_akhir' => $jamkeluar,
			'keterangan' => $keterangan
		);

		$where = array(
			'id' => $id_shift
		);

		$aksi = $this->Model_admin->updatedataArray($where, $data, 'shift');
		if($aksi){

			print "<script>alert('Data Berhasil Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}else{

			print "<script>alert('Data Gagal Diperbaharui!');history.go(-1);</script>";
			// redirect(base_url('admin/getDataKaryawan'));
			exit();

		}
	}

	public function deleteShift(){
		$where = $this->uri->segment(3);
		$this->Model_admin->delete($where,'id','shift');
		print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
		exit();
	}

	public function getDataListAbsensi()
	{
		$data['karyawan'] = $this->Model_admin->m_getDataKaryawan();
		$this->load->view('data_absensi',$data);
	}

	public function exportimportAbsensi()
	{
		$this->load->view('export_import_absensi');
	}

	public function getDataInvoice()
	{
		$from = $this->session->userdata('awalRange');
		$to = $this->session->userdata('akhirRange');
		$data['karyawan'] = $this->Model_admin->m_getDataKaryawanJabs($from,$to);
		$this->load->view('data_invoice',$data);
	}

	public function setRangeInvoice()
	{
		$awal = $this->input->post('tanggalAwal');
		$akhir = $this->input->post('tanggalAkhir');

		$from = $this->session->userdata('awalRange');
		$to = $this->session->userdata('akhirRange');
		$data['karyawan'] = $this->Model_admin->m_getDataKaryawanJabs($from,$to);
		$this->session->set_userdata('awalRange', $awal);
		$this->session->set_userdata('akhirRange', $akhir);
		$this->load->view('data_invoice',$data);
	}

	public function cetakInvoice()
	{
		$this->load->view('cetak_invoice_gaji');
	}

	public function getLaporanInvoice()
	{
		$this->load->view('data_laporan_invoice');
	}
}
