<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mInputData extends CI_Model {

	function GetDataGuru()
	{
		$query = $this->db->get('data_guru');
        return $query->result();
	}

	function GetDataKelas()
	{
		$query = $this->db->get('data_kelas');
        return $query->result();
	}	

	function GetDataJadwal()
	{
		$query = $this->db->get('data_jadwal');
        return $query->result();
	}
	
	public function update_guru($idGuru, $namaGuru) 
	{
        $data = array('nama_guru' => $namaGuru);
        $this->db->where('id_guru', $idGuru);
        $this->db->update('data_guru', $data);
    }

	public function add_guru($namaGuru) 
	{
        $this->db->insert('data_guru', $namaGuru);
    }
}