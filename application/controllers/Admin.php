<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function kelas()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function jadwal()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_xii()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_xi()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function absen_x()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function laporan_hari()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}

	public function laporan_bulan()
	{
		$this->load->view('admin/layouts/meta');
		$this->load->view('admin/layouts/navbar');
		$this->load->view('admin/layouts/sidebar');
		$this->load->view('admin/data/guru');
		$this->load->view('admin/layouts/footer');
		$this->load->view('admin/layouts/script');
	}
}