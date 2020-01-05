<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Aktivitas extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('JadwalM');
	}
    
	public function index()
	{
		$this->session->set_flashdata('activemenu','aktivitas');
		$data['jadwal'] = $this->JadwalM->tampil_jadwal($this->session->nip);
    	$this->load->view('aktivitas', $data);
	}

	public function updatejadwal($id_jadwal = null)
	{	
		if (empty($id_jadwal)) {
			redirect('aktivitas');
		} else {
			$data['jadwalupdate'] = $this->JadwalM->tampil_jadwal_update($id_jadwal);
        	$this->load->view('updatejadwal', $data);
		}
	}

	public function tambah()
	{
		$this->session->set_flashdata('activemenu','aktivitas');
		$data['jadwal'] = $this->JadwalM->tampil_jadwal($this->session->nip);
		$data['matkul']=$this->db->get('tbmatkul')->result();
		$data['kelas']=$this->db->get('tbkelas')->result();
		$this->load->view('aktivitas_tambah', $data);
	}

	public function TambahMatkul()
	{
		$this->session->set_flashdata('activemenu','aktivitas');
		$this->load->view('tambah_matkul');	
	}

	public function matkulplus()
	{
		$matkul = $this->input->post('nama');
		$data = array('nama_matkul' => $matkul);
		if ($this->db->insert('tbmatkul', $data)) {
			$tambahmatkul = array(
	        		'pesan1' =>	'Berhasil Menambah Mata Kuliah', 
	        		'pesan2' =>	'success',
	        		'pesan3' =>	'Sukses!',
	        		'pesan4' =>	'btn btn-success'
	        	);
		}
		else{
			$tambahmatkul = array(
        		'pesan1' =>	'Gagal Menambah Mata Kuliah', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
		}
		$this->session->set_flashdata('pesan', $tambahmatkul);
		redirect('aktivitas');
	}

	public function aktivitas_tambah_do()
	{
		$matkul = $this->input->post('matkul');
		$kelas = $this->input->post('kelas');
		$utcwaktu = $this->input->post('waktu');

		$dt = strtotime($utcwaktu);
		$waktu = date('Y-m-d h:i:s', $dt);

		$data = array(
			'id_matkul' => $matkul,
			'id_kelas' => $kelas,
			'waktu' => $waktu,
			'nip' => $this->session->nip
		);
		if ($this->db->insert('tbjadwal', $data)) {
			$tambahjadwal = array(
	        		'pesan1' =>	'Berhasil Menambah jadwal', 
	        		'pesan2' =>	'success',
	        		'pesan3' =>	'Sukses!',
	        		'pesan4' =>	'btn btn-success'
	        	);
		}
		else{
			$tambahjadwal = array(
        		'pesan1' =>	'Gagal Menambah jadwal', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
		}
		$this->session->set_flashdata('pesan', $tambahjadwal);
		redirect('aktivitas');
	}

	public function update_jadwal(){
		$updatejadwal = array();
		$waktu = $this->input->post('waktu');
		$id_jadwal = $this->input->post('id_jadwal');
		if (!empty($waktu) && !empty($id_jadwal)) {
			$data = array(
			   	'waktu'		=> $waktu
			);
			$updatejadwal = array(
        		'pesan1' =>	'Berhasil memperbarui jadwal', 
        		'pesan2' =>	'success',
        		'pesan3' =>	'Sukses!',
        		'pesan4' =>	'btn btn-success'
        	);
			$this->JadwalM->update_jadwal_web($data, $id_jadwal);
		} else {
			$updatejadwal = array(
        		'pesan1' =>	'Gagal memperbarui jadwal', 
        		'pesan2' =>	'error',
        		'pesan3' =>	'Error!',
        		'pesan4' =>	'btn btn-danger'
        	);
		}
		$this->session->set_flashdata('pesan', $updatejadwal);
		redirect('aktivitas');
	}

	public function cetakjadwal()
	{
		$nis = $_POST['nis'];
		$data['posts'] = $this->model->tampil_jadwal("where nis = '$nis'");
    	$this->load->view('admin/cetakjadwal',$data);
	}
}
