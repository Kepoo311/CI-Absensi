<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mInputData extends CI_Model {

	public function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
	function GetDataGuru()
	{
		$query = $this->db->get('tb_guru');
        return $query->result();
	}

	function GetDataKelas()
	{
		$query = $this->db->get('tb_kelas');
        return $query->result();
	}	

	function GetDataJadwal()
	{
		$query = $this->db->get('tb_jadwal');
        return $query->result();
	}
	
	public function update_guru($idGuru, $namaGuru) 
	{
        $data = array('nama_guru' => $namaGuru);
        $this->db->where('id_guru', $idGuru);
        return $this->db->update('tb_guru', $data);
    }

	public function add_guru($namaGuru) 
	{
		$guru_data = array(
			'nama_guru' => $namaGuru
		);
		return $this->db->insert('tb_guru', $guru_data);
    }

	public function add_kelas($namaKelas) 
	{
		$data = array(
			'nama_kelas' => $namaKelas
		);
		return $this->db->insert('tb_kelas', $data);
    }
}