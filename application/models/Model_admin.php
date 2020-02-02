<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Model_admin extends CI_Model {

	// private $db;

	// function __construct()
	// {
	// 	$this->db2=$this->load->database('sistem_penggajian',TRUE);
    // }

    // SELECT AREA
    public function m_getDataKaryawan(){
		return $this->db->query("SELECT a.NIK,a.nama_karyawan,b.nama_divisi,c.nama_jabatan,a.tanggal_masuk FROM karyawan a join divisi b on a.id_divisi=b.id join jabatan c on a.id_jabatan=c.id");
    }

    public function m_getDataJabatan(){
		return $this->db->query("SELECT a.nama_jabatan,a.masa_jabatan,a.masa_promosi,b.nama_divisi FROM jabatan a join divisi b on a.id_divisi=b.id");
    }
    

    // // INSERT AREA
    // function insertdataArray($data,$table){
	// 	return $this->db->insert($table, $data); 
    // }
    
    // // UPDATE AREA
    // public function updatedataArray($where, $data, $tabel){
		
	// 	return $this->db->where($where)->update($tabel, $data);	
    // }
    
    // // DELETE AREA
    // function delete($id){
	// 	return $this->db->query("");
	// }
}