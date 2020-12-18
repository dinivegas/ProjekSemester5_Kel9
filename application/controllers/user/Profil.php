<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('M_profil');
		$this->load->helper('url');
	}	

	public function index()
	{
		$data['mahasiswa'] = $this->m_profil->tampil_data()->result();
		$this->load->view('user/profil', $data);
	}

}