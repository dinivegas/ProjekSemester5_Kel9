<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_psikolog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_psikolog');
		$this->load->database();
	}	

	public function index()
	{
		$data['psikolog'] = $this->m_psikolog->tampil_data();
		$this->load->view('admin/data_psikolog', $data);
	}

	public function hapus ($id_psikolog)
	{
		$where = array ('id_psikolog' => $id_psikolog);
		$this->m_psikolog->hapus_data($where, 'tb_psikolog');
		
	}
	

	public function update_aksi($id_psikolog)
	{
		$nama				= $this->input->post('nama');
		$no_hp				= $this->input->post('no_hp');
		$email				= $this->input->post('email');
		$bidang				= $this->input->post('bidang');
		$alamat				= $this->input->post('alamat');
		$foto				= $this->input->post('foto');
		
	
		$data	= array (
			'nama_psikolog'			=> $nama,
			'nohp_psikolog'			=> $no_hp,
			'email_psikolog'		=> $email,
			'bidang_psikolog'		=> $bidang,
			'alamat_psikolog'		=> $alamat,
			'foto_psikolog'			=> $foto,
			
		
		);

		//$this->m_psikolog->input_data($data, 'tb_psikolog');
		$this->db->update('tb_psikolog',$data, ['id_psikolog' => $id_psikolog]);
		redirect('admin/data_psikolog/index');
	}

	public function tambah_aksi()
	{
		$nama				= $this->input->post('nama');
		$no_hp				= $this->input->post('no_hp');
		$email				= $this->input->post('email');
		$bidang				= $this->input->post('bidang');
		$alamat				= $this->input->post('alamat');
		$foto				= $this->input->post('foto');
		
	
		$data	= array (
			'nama_psikolog'			=> $nama,
			'nohp_psikolog'			=> $no_hp,
			'email_psikolog'		=> $email,
			'bidang_psikolog'		=> $bidang,
			'alamat_psikolog'		=> $alamat,
			'foto_psikolog'			=> $foto,
		
		);

		//$this->m_psikolog->input_data($data, 'tb_psikolog');
		$this->db->insert('tb_psikolog',$data);
		redirect('admin/data_psikolog/index');
	}
	


}
