<?php
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

		$data['kelas'] = $this->mabsensi->GetDataKelas('XII ');
		
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
		
		$this->minputdata->update_guru($idGuru, $namaGuru);

		redirect('admin/guru','refresh');
    }

	public function add_guru() 
	{
        $namaGuru = $this->input->post('nama');
		
		$this->minputdata->add_guru($namaGuru);

		redirect('admin/guru','refresh');
    }

  public function show_jadwal()
	{
		$kelas = $_POST['kelas'];
	    $tg = $_POST['date'];
	    $idhariini = $_POST['hari'];

	    function tgl_indo($tanggal){
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
	      
	     
	      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	    }

	    $query = $this->db->get_where('jadwal_pelajaran', array('nama_kelas' => $kelas, 'id_hari' => $idhariini));
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
                  <th>Absensi</th>
                  <th>Keterangan Lain</th>
                </tr>
              </thead>
              <tbody>';
    $no = 1;
    foreach ($jadwal_pelajaran as $query) {
      $data .= '<input type="hidden" name="nama_guru[]" value="'.$query->nama_guru.'"> ';
    	$data .= '<tr><td>';
    	$data .= $no++;
    	$data .= '</td>';
    	$data .= '<td>';
    	$data .= $query->nama_guru;
    	$data .= '<td>';
    	$data .= '<select name="absen[]" id="absen" class="form-control">
			<option value="Hadir">Hadir</option>
			<option value="Sakit">Sakit</option>
			<option value="Ijin">Ijin</option>
			<option value="Alpa">Tanpa Keterangan</option>
			</select>';
    	$data .= '</td>';
    	$data .= '<td>';
    	$data .= '<input type="text" name="ket_lain[]" id="ket_lain" class="form-control">';
    	$data .= '</td></tr>';

    }
    $data .= '</tbody></table>';
    $data .= '</div></div></div></div>';
    $data .= '<button type="submit" class="btn btn-info">Input</button>';
        	
		echo json_encode($data);

	}

	function input_absen()
	{
		$kelas = $this->input->post('kelas');
		$tanggal = $this->input->post('date');

		if (!$this->mabsensi->absensi_exists($kelas, $tanggal)) {
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
            $this->mabsensi->insert_absensi($data);
            redirect('guru_piket/absen_xii','refresh');
            
        } else {
            
			redirect('guru_piket/absen_xii','refresh');
        }
	}

}