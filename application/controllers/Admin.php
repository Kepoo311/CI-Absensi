<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('minputdata');
		$this->load->model('mabsensi');
		$this->load->helper('form');
        $this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function guru()
	{
        // Mengambil data guru dari model
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
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');

		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_xii()
	{
		$data['kelas'] = $this->mabsensi->AbsensiKelasXII();

		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/absen/xii', $data);
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_xi()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');

		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_x()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');

		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function laporan_hari()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');

		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function laporan_bulan()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');

		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function edit_guru() 
	{
		$idGuru = $this->input->post('id');
        $namaGuru = $this->input->post('nama');
		
		$this->minputdata->update_guru($idGuru, $namaGuru);

		redirect('admin/guru','refresh');
    }

	public function add_guru() 
	{
        $namaGuru = $this->input->post('nama');
		
		$this->minputdata->add_guru($namaGuru);

		redirect('admin/guru','refresh');
    }
}