<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mAbsensi extends CI_Model {

	function AbsensiKelasXII()
	{
		$this->db->like('nama_kelas', 'XII ', 'after'); // Menggunakan LIKE 'XI %'
        $query = $this->db->get('data_kelas'); // Ganti 'nama_tabel' dengan nama tabel Anda
        return $query->result();
	}

	function AbsensiKelasXI()
	{
		$this->db->like('nama_kelas', 'XI ', 'after'); // Menggunakan LIKE 'XI %'
        $query = $this->db->get('data_kelas'); // Ganti 'nama_tabel' dengan nama tabel Anda
        return $query->result();
	}	

	function AbsensiKelasX()
	{
		$this->db->like('nama_kelas', 'X ', 'after'); // Menggunakan LIKE 'XI %'
        $query = $this->db->get('data_kelas'); // Ganti 'nama_tabel' dengan nama tabel Anda
        return $query->result();
	}	

}