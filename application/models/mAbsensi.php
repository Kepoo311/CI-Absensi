<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mAbsensi extends CI_Model {

    public function j_kelas_sudah_absen($tanggal)
    {
        $this->db->distinct();
        $this->db->select('kelas');
        $this->db->where('tanggal', $tanggal);
        return $this->db->count_all_results('tb_absensi');
    }

    public function jumlah_kelas()
    {
        return $this->db->count_all_results('tb_kelas');
    }

    public function jumlah_guru()
    {
        return $this->db->count_all_results('tb_guru');
    }

    public function jumlah_jadwal()
    {
        return $this->db->count_all_results('tb_jadwal');
    }

    public function jumlah_users($role)
    {
        $this->db->where('role', $role);
        return $this->db->count_all_results('tb_users');
    }

	function GetDataKelas($kelas)
	{
		$this->db->like('nama_kelas', $kelas, 'after');
        $query = $this->db->get('tb_kelas');
        return $query->result();
	}

	public function absensi_exists($kelas, $tanggal)
    {
        $this->db->where('kelas', $kelas);
        $this->db->where('tanggal', $tanggal);
        $query = $this->db->get('tb_absensi');
        return $query->num_rows() > 0;
    }

    function GetKelasBelumAbsen($kelas, $tanggal)
    {
        $kelasData = $this->GetDataKelas($kelas); // Mengambil data kelas

        $kelasWithoutAbsensi = array();
        
        foreach ($kelasData as $kelas) {
            if (!$this->absensi_exists($kelas->nama_kelas, $tanggal)) {
                $kelasWithoutAbsensi[] = $kelas;
            }
        }

        return $kelasWithoutAbsensi;
    }

    public function insert_absensi($data)
    {
        return $this->db->insert_batch('tb_absensi', $data);
    }

    public function GuruAlpa($tanggal)
    {
        $this->db->select('*');
        $this->db->from('tb_absensi');
        $this->db->where('tanggal', $tanggal);
        $this->db->where('status_absen', 'Alpa');
        $query = $this->db->get();
        return $result = $query->result();
    }
}