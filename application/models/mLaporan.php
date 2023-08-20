<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mLaporan extends CI_Model {

   public function kelas_sudah_absen()
   {
      $this->db->distinct();
      $this->db->select('kelas');
      $this->db->where('tanggal', date('2023-08-14'));
      $this->db->group_by('kelas');
      $this->db->order_by('kelas', 'ASC');
      return $this->db->get('data_absensi')->result();
   }

   public function get_data_guru()
   {
     return $this->db->get('data_guru')->result();
   }

   public function absensi_hari_ini($kelas)
   {
     $this->db->where('kelas', $kelas);
     $this->db->where('tanggal', date('2023-08-14'));
     return $this->db->get('data_absensi')->result();
   }

   public function getAbsensiDataByDate($tanggal) {

     $query = "SELECT dg.nama_guru,
         SUM(CASE WHEN da.status_absen = 'Hadir' THEN 1 ELSE 0 END) AS hadir,
         SUM(CASE WHEN da.status_absen = 'Sakit' THEN 1 ELSE 0 END) AS sakit,
         SUM(CASE WHEN da.status_absen = 'Izin' THEN 1 ELSE 0 END) AS izin,
         SUM(CASE WHEN da.status_absen = 'Alpa' THEN 1 ELSE 0 END) AS alpa
     FROM data_guru dg 
     LEFT JOIN data_absensi da ON dg.nama_guru = da.nama_guru AND DAY(da.tanggal) = '$tanggal' 
     GROUP BY dg.id_guru";

     return $this->db->query($query)->result();
    }

    public function getAbsensiDataByMonth($bulan, $guru)
    {
     $query = "SELECT nama_guru,
         SUM(CASE WHEN status_absen = 'Hadir' THEN 1 ELSE 0 END) AS total_hadir,
         SUM(CASE WHEN status_absen = 'Sakit' THEN 1 ELSE 0 END) AS total_sakit,
         SUM(CASE WHEN status_absen = 'Izin' THEN 1 ELSE 0 END) AS total_izin,
         SUM(CASE WHEN status_absen = 'Alpa' THEN 1 ELSE 0 END) AS total_alpa,
         GROUP_CONCAT(keterangan) AS keterangan
         FROM data_absensi
         WHERE MONTH(tanggal) = '$bulan'
         AND nama_guru = '$guru'";

     return $this->db->query($query)->result();
    }

    public function getLaporanData($bulan)
    {
        $query = "SELECT dg.nama_guru,
            SUM(CASE WHEN da.status_absen = 'Hadir' THEN 1 ELSE 0 END) AS total_hadir,
            SUM(CASE WHEN da.status_absen = 'Sakit' THEN 1 ELSE 0 END) AS total_sakit,
            SUM(CASE WHEN da.status_absen = 'Izin' THEN 1 ELSE 0 END) AS total_izin,
            SUM(CASE WHEN da.status_absen = 'Alpa' THEN 1 ELSE 0 END) AS total_alpa,
            GROUP_CONCAT(da.keterangan) AS keterangan
        FROM data_guru dg
        LEFT JOIN data_absensi da ON dg.nama_guru = da.nama_guru AND MONTH(da.tanggal) = '$bulan'
        GROUP BY dg.id_guru";

        return $this->db->query($query)->result();
    }
}