<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_admin');
		$this->load->library('pdf');

	}
	
	public function index()
	{
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){

			$this->load->view('dashboard');
		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataKaryawan()
	{
		$data['akhir'] = $this->Model_admin->lastNIKKaryawan();
		$new = '';
		foreach($data['akhir']->result() as $ls){
			$new = substr($ls->NIK,4);
		}
		

		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$data['lastNIK'] = 'STTB'.($new+1);
			$data['karyawan'] = $this->Model_admin->m_getDataKaryawan();
			$data['divisi'] = $this->Model_admin->m_getDataDivisi();
			$data['jabatan'] = $this->Model_admin->m_getDataJabatan();
			$this->load->view('data_karyawan',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function insertKaryawan(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function updateKaryawan(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function deleteKaryawan(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$where = $this->uri->segment(3);
			$this->Model_admin->delete($where,'NIK','karyawan');
			print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
			exit();

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataJabatan()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$data['divisi'] = $this->Model_admin->m_getDataDivisi();
			$data['jabatan'] = $this->Model_admin->m_getDataJabatan();
			$this->load->view('data_jabatan',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function insertJabatan(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function updateJabatan(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}
	
	public function deleteJabatan(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$where = $this->uri->segment(3);
			$this->Model_admin->delete($where,'id','jabatan');
			print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
			exit();

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataGaji()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$data['jabatan'] = $this->Model_admin->m_getDataJabatan();
			$data['gaji'] = $this->Model_admin->m_getDataGaji();
			$this->load->view('data_gaji',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function insertGaji(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function updateGaji(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

		
	public function deleteGaji(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$where = $this->uri->segment(3);
			$this->Model_admin->delete($where,'id','gaji');
			print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
			exit();

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataBonus()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$data['bonus'] = $this->Model_admin->m_getDataBonus();
			$this->load->view('data_bonus',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}
	
	public function insertBonus(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function updateBonus(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

		
	public function deleteBonus(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$where = $this->uri->segment(3);
			$this->Model_admin->delete($where,'id','bonus');
			print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
			exit();

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataLembur()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$data['shift'] = $this->Model_admin->m_getDataShift();
			$data['lembur'] = $this->Model_admin->m_getDataLembur();
			$this->load->view('data_lembur',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function insertLembur(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function updateLembur(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function deleteLembur(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$where = $this->uri->segment(3);
			$this->Model_admin->delete($where,'id','lembur');
			print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
			exit();

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataShift()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$data['shift'] = $this->Model_admin->m_getDataShift();
			$this->load->view('data_shift',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function insertShift(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function updateShift(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
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

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function deleteShift(){
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$where = $this->uri->segment(3);
			$this->Model_admin->delete($where,'id','shift');
			print "<script>alert('Data Berhasil DiHapus!');history.go(-1);</script>";
			exit();

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataListAbsensi()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$data['karyawan'] = $this->Model_admin->m_getDataKaryawan();
			$this->load->view('data_absensi',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function lihatAbsensi()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$nik = $this->uri->segment(3);
			$data['absensi'] = $this->Model_admin->m_getDataAbsensi($nik);
			$this->load->view('lihat_data_absensi',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function exportimportAbsensi()
	{
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$this->load->view('export_import_absensi');

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function getDataInvoice()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$from = $this->session->userdata('awalRange');
			$to = $this->session->userdata('akhirRange');
			$data['karyawan'] = $this->Model_admin->m_getDataKaryawanJabsG($from,$to);
			$this->load->view('data_invoice',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function setRangeInvoice()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$awal = $this->input->post('tanggalAwal');
			$akhir = $this->input->post('tanggalAkhir');
	
			$from = $this->session->userdata('awalRange');
			$to = $this->session->userdata('akhirRange');
			$data['karyawan'] = $this->Model_admin->m_getDataKaryawanJabs($from,$to);
			$this->session->set_userdata('awalRange', $awal);
			$this->session->set_userdata('akhirRange', $akhir);
			redirect(base_url('admin/getDataInvoice'));
			// $this->load->view('data_invoice',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function cetakInvoice()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$id_karyawan =$this->uri->segment(3);
			$from = $this->session->userdata('awalRange');
			$to = $this->session->userdata('akhirRange');
			$data['invoice'] = $this->Model_admin->checkinvoiceBulan($id_karyawan,$from,$to);
			$this->load->view('cetak_invoice_gaji',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function lihatInvoiceGaji()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$from = $this->session->userdata('awalRange');
			$to = $this->session->userdata('akhirRange');
			$nik = $this->uri->segment(3);
			$data['bonus'] = $this->Model_admin->m_getDataBonus();
			$data['lembur'] = $this->Model_admin->m_getDataLembur();
			$data['absensinoTelat'] = $this->Model_admin->m_getDataAbsensinoTelat($nik)->row();
			$data['absensiTelat'] = $this->Model_admin->m_getDataAbsensiTelat($nik)->row();
			$data['lemburShift1'] = $this->Model_admin->m_getLembur($nik,'1',$from,$to);
			$data['lemburShift2'] = $this->Model_admin->m_getLembur($nik,'2',$from,$to);
			$data['lemburShift3'] = $this->Model_admin->m_getLembur($nik,'3',$from,$to);
	
			$data['profile_karyawan'] = $this->Model_admin->m_getDataKaryawanId($nik)->row();
			$this->load->view('lihat_invoice_perkaryawan',$data);

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}

	public function saveInvoice(){

		$id_karyawan = $this->input->post('id_karyawan');
		$from = $this->session->userdata('awalRange');
		$to = $this->session->userdata('akhirRange');
		$gapok = $this->input->post('vGapok');
		$jumlah_hadirnoTelat = $this->input->post('vabsenNoTelat');
		$jumlah_hadirTelat = $this->input->post('vabsenTelat');
		$bonus_arr = $this->input->post('vidBonus');
		$id_bonus = implode(',',$bonus_arr);
		$total_bonus = $this->input->post('total_bonus');
		$lembur_arr = $this->input->post('vidLembur');
		$id_lembur = implode(',',$lembur_arr);
		$total_lembur = $this->input->post('total_lembur');
		$tanggal_cetak = date('Y-m-d');
		$take_home_pay = $this->input->post('take_home_pay');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_karyawan' => $id_karyawan,
			'range_awal' => $from,
			'range_akhir' => $to,
			'gapok' => $gapok,
			'jumlah_hadir_no_telat' => $jumlah_hadirnoTelat,
			'jumlah_hadir_telat' => $jumlah_hadirTelat,
			'id_bonus' => $id_bonus,
			'total_bonus' => $total_bonus,
			'id_lembur' => $id_lembur,
			'total_lembur' => $total_lembur,
			'tanggal_cetak' => $tanggal_cetak,
			'take_home_pay' => $take_home_pay,
			'keterangan' => $keterangan
		);

		$where = array(
			'range_awal' => $from,
			'range_akhir' => $to,
			'id_karyawan' => $id_karyawan
		);
		$cek = $this->Model_admin->checkinvoiceBulan($id_karyawan,$from,$to);
		if($cek->num_rows() > 0){

	
			$aksi = $this->Model_admin->updatedataArray($where, $data, 'invoice');
			if($aksi){
	
				print "<script>alert('Data Berhasil Diperbaharui!');history.go(-1);</script>";
				// redirect(base_url('admin/getDataKaryawan'));
				exit();
	
			}else{
	
				print "<script>alert('Data Gagal Diperbaharui!');history.go(-1);</script>";
				// redirect(base_url('admin/getDataKaryawan'));
				exit();
	
			}

		}else{
			$aksi = $this->Model_admin->insertdataArray($data,'invoice');
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
	}

	public function getLaporanInvoice()
	{
		
		$cek = $this->session->userdata('loginAuth');
		if(isset($cek)){
			$this->load->view('data_laporan_invoice');

		}else{

			print "<script>alert('Akses Ditolak!');</script>";
			redirect(base_url('login'));
		}
	}
}
