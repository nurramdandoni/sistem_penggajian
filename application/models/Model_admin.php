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
		return $this->db->query("SELECT a.NIK,a.nama_karyawan,b.id as id_divisi,b.nama_divisi,c.id as id_jabatan,c.nama_jabatan,a.tanggal_masuk FROM karyawan a join divisi b on a.id_divisi=b.id join jabatan c on a.id_jabatan=c.id");
    }

    public function lastNIKKaryawan(){
		return $this->db->query("SELECT a.NIK FROM karyawan a ORDER by a.NIK DESC LIMIT 1");
    }

    public function m_getDataDivisi(){
		return $this->db->query("SELECT a.id,a.nama_divisi,a.keterangan FROM divisi a");
    }

    public function m_getDataJabatan(){
		return $this->db->query("SELECT a.id,a.id_divisi,a.nama_jabatan,a.masa_jabatan,a.masa_promosi,b.nama_divisi FROM jabatan a join divisi b on a.id_divisi=b.id");
    }

    public function m_getDataGaji(){
		return $this->db->query("SELECT a.id,a.id_jabatan as id_jabatan,b.nama_jabatan,a.gaji,a.keterangan FROM gaji a join jabatan b on a.id_jabatan=b.id");
    }

    public function m_getDataBonus(){
		return $this->db->query("SELECT a.id,a.nama_bonus,a.insentif,a.keterangan FROM bonus a");
    }

    public function m_getDataLembur(){
		return $this->db->query("SELECT a.id,b.id as id_shift,b.nama_shift,a.nama_lembur,a.satuan,a.insentif,a.keterangan FROM lembur a join shift b on a.id_shift=b.id");
    }

    public function m_getDataShift(){
		return $this->db->query("SELECT a.id,a.nama_shift,a.jam_awal,a.jam_akhir,a.keterangan FROM shift a");
    }
    

    // // INSERT AREA
    function insertdataArray($data,$table){
		return $this->db->insert($table, $data); 
    }
    
    // // UPDATE AREA
    public function updatedataArray($where, $data, $tabel){
		
		return $this->db->where($where)->update($tabel, $data);	
    }
    
    // // DELETE AREA
    function delete($id,$field,$table){
		return $this->db->query("DELETE FROM ".$table." WHERE ".$field."='$id'");
	  }
}