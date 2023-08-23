<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mAbsensi extends CI_Model {

    public function jumlah_kelas()
    {
        return $this->db->count_all_results('data_kelas');
    }

    public function jumlah_guru()
    {
        return $this->db->count_all_results('data_guru');
    }

    public function jumlah_jadwal()
    {
        return $this->db->count_all_results('jadwal_pelajaran');
    }

    public function jumlah_users($role)
    {
        $this->db->where('role', $role);
        return $this->db->count_all_results('tb_users');
    }

	function GetDataKelas($kelas)
	{
		$this->db->like('nama_kelas', $kelas, 'after');
        $query = $this->db->get('data_kelas');
        return $query->result();
	}

	public function absensi_exists($kelas, $tanggal)
    {
        $this->db->where('kelas', $kelas);
        $this->db->where('tanggal', $tanggal);
        $query = $this->db->get('data_absensi');
        return $query->num_rows() > 0;
    }

    public function insert_absensi($data)
    {
        return $this->db->insert_batch('data_absensi', $data);
    }
}