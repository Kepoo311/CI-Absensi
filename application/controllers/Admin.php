<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('minputdata');
		$this->load->model('mabsensi');
		$this->load->model('mlaporan');
		$this->load->helper('form');
    	$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('download');
	}

	public function index()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$data['admin'] = $this->mabsensi->jumlah_users('Admin');
		$data['guru'] = $this->mabsensi->jumlah_guru();
		$data['kelas'] = $this->mabsensi->jumlah_kelas();
		$data['jadwal'] = $this->mabsensi->jumlah_jadwal();

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function guru()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$data['guru'] = $this->minputdata->GetDataGuru();

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function kelas()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$data['kelas'] = $this->minputdata->GetDataKelas();

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/kelas', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function jadwal()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$data['kelas'] = $this->mabsensi->GetDataKelas('X');
		
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/jadwal', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_xii()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$data['kelas'] = $this->mabsensi->GetDataKelas('XII ');

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/absen/input_absen', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_xi()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$data['kelas'] = $this->mabsensi->GetDataKelas('XI ');

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/absen/input_absen', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_x()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$data['kelas'] = $this->mabsensi->GetDataKelas('X ');

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/absen/input_absen', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function laporan_hari()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}

		$kelas_sudah_absen = $this->mlaporan->kelas_sudah_absen();
        
    	$data['kelas'] = $kelas_sudah_absen;

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan/hari', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function laporan_bulan()
	{
		if ($this->session->userdata('role') != 'Admin') {
			redirect('','refresh');
		}
		
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/laporan/bulan');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function edit_guru() 
	{
		$idGuru = $this->input->post('id');
        $namaGuru = $this->input->post('nama');
		
		$insert = $this->minputdata->update_guru($idGuru, $namaGuru);
		if ($insert) {
			$this->session->set_flashdata('success', 'Edit Nama Guru berhasil');
		} else {
			$this->session->set_flashdata('error', 'Edit Nama Guru Gagal');
		}

		redirect('admin/guru','refresh');
    }

	public function add_guru() 
	{
        $namaGuru = $this->input->post('nama');
		
		$insert = $this->minputdata->add_guru($namaGuru);
		if ($insert) {
			$this->session->set_flashdata('success', 'Tambah Guru berhasil');
		} else {
			$this->session->set_flashdata('error', 'Tambah Guru Gagal');
		}

		redirect('admin/guru','refresh');
    }

	public function add_kelas() 
	{
        $nama = $this->input->post('nama');
		
		$insert = $this->minputdata->add_kelas($nama);
		if ($insert) {
			$this->session->set_flashdata('success', 'Tambah Kelas berhasil');
		} else {
			$this->session->set_flashdata('error', 'Tambah Kelas Gagal');
		}

		redirect('admin/kelas','refresh');
    }

	public function import_kelas() 
	{
        //$this->load->library('PhpSpreadsheet');
        
        if ($_FILES['uploadfile']['name']) 
		{
            $inputFileName = $_FILES['uploadfile']['tmp_name'];

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            $headers = array_shift($rows);

            foreach ($rows as $row) {
                $data = array_combine($headers, $row);

                $guru_data = array(
                    'nama_kelas' => $data['nama_kelas']
                );

                $this->db->insert('tb_kelas', $guru_data);
            }

			$this->session->set_flashdata('success', 'Import data kelas berhasil');
            redirect('admin/kelas','refresh');
        }
    }

	public function import_guru() 
	{
        //$this->load->library('PhpSpreadsheet');
        
        if ($_FILES['uploadfile']['name']) 
		{
            $inputFileName = $_FILES['uploadfile']['tmp_name'];

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            $headers = array_shift($rows);

            foreach ($rows as $row) {
                $data = array_combine($headers, $row);

                $guru_data = array(
                    'nama_guru' => $data['nama_guru']
                );

                $this->db->insert('tb_guru', $guru_data);
            }

			$this->session->set_flashdata('success', 'Import data Guru berhasil');
            redirect('admin/guru','refresh');
        }
    }

	public function import_jadwal() 
	{
        //$this->load->library('PhpSpreadsheet');
        
        if ($_FILES['uploadfile']['name']) 
		{
            $inputFileName = $_FILES['uploadfile']['tmp_name'];

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            $headers = array_shift($rows);

            foreach ($rows as $row) {
                $data = array_combine($headers, $row);

                $data_jadwal = array(
                    'id_hari' => $data['id_hari'],
					'nama_hari' => $data['nama_hari'],
					'id_kelas' => $data['id_kelas'],
					'nama_kelas' => $data['nama_kelas'],
					'id_guru' => $data['id_guru'],
					'nama_guru' => $data['nama_guru'],
					'keterangan' => $data['keterangan']
                );

                $this->db->insert('tb_jadwal', $data_jadwal);
            }

			$this->session->set_flashdata('success', 'Import data Jadwal berhasil');
            redirect('admin/jadwal','refresh');
        }
    }

	public function downloadFile($filename)
	{
    	$file_path = FCPATH . 'assets/files/' . $filename;
		$new_file_name = $filename;

		force_download($new_file_name, file_get_contents($file_path));
		$this->session->set_flashdata('success', 'File sedang di download.');
		redirect('admin/guru','refresh');
	}

	

	public function data_jadwal()
	{
		$kelas = $_POST['kelas'];
	    $tg = $_POST['date'];
	    $idhariini = $_POST['hari'];

	    function tgl_indo($tanggal){
			$nama_hari = array(
				'Sunday' => 'Minggu',
				'Monday' => 'Senin',
				'Tuesday' => 'Selasa',
				'Wednesday' => 'Rabu',
				'Thursday' => 'Kamis',
				'Friday' => 'Jumat',
				'Saturday' => 'Sabtu'
			);

			$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
			);
			$pecahkan = explode('-', $tanggal);
			$hari = date('l');
		
			return $nama_hari[$hari] . ', ' . $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . '';
	    }

	    $query = $this->db->get_where('tb_jadwal', array('nama_kelas' => $kelas, 'id_hari' => $idhariini));
	    $jadwal_pelajaran = $query->result();

		$data = '';
		$data .= '<div class="card-header"><h3 class="card-title">Input Absensi</h3></div><div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <table>
                  <tr>
                    <td style="padding-right: 20px">Nama Kelas</td><td>:</td><td style="padding-left: 10px">';
        $data .= $kelas;
        $data .= '<input type="hidden" name="kelas" value="'.$kelas.'"> ';

        $data .= '<input type="hidden" name="date" value="'.$tg.'"> ';
        $data .= '</td>
                  </tr><tr><td>Tanggal</td><td>:</td><td style="padding-left: 10px">';
        $data .= tgl_indo($tg);
        $data .= '</td>
                  </tr>
                </table>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>';
        $no = 1;
        foreach ($jadwal_pelajaran as $query) {
        	$data .= '<tr><td>';
        	$data .= $no++;
        	$data .= '</td>';
        	$data .= '<td>';
        	$data .= $query->nama_guru;
        	$data .= '<td>';
        	$data .= $query->keterangan;
        	$data .= '</td></tr>';

        }
        $data .= '</tbody></table>';
        $data .= '</div></div></div></div>';
        	
		echo json_encode($data);
	}

	function input_absen()
	{
		$kelas = $this->input->post('kelas');
		$tanggal = $this->input->post('date');

		if (!$this->mabsensi->absensi_exists($kelas, $tanggal)) 
		{
      		// Lakukan input absensi
      		$nama_guru = $this->input->post('nama_guru[]');
			$absen = $this->input->post('absen[]');
			$ket_lain = $this->input->post('ket_lain[]');

			$data = array();
			$index = 0;
			foreach ($absen as $data_absen) {

				array_push($data, array(
					'kelas' => $this->input->post('kelas'),
					'tanggal' => $tanggal,
					'nama_guru' => $nama_guru[$index],
					'status_absen' => $absen[$index],
					'keterangan' => $ket_lain[$index],
					
					
					
				));

				$index++;
				
			}
            $insert = $this->mabsensi->insert_absensi($data);
			if ($insert) {
				$this->session->set_flashdata('success', 'Input data absen berhasil');
				redirect('gurupiket/laporan_hari','refresh');
			} else {
				$this->session->set_flashdata('error', 'Input data absen kelas Gagal');
				redirect('gurupiket/laporan_hari','refresh');
			}
            
            
        } else {
            $this->session->set_flashdata('error', 'Kelas ini sudah di absen');
			redirect('gurupiket/laporan_hari','refresh');
        }
	}

}