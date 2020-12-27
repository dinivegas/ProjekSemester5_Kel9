
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller{
    public function __construct(){
		parent::__construct();
		$this->load->model('M_riwayat');
		$this->load->database();
	}	

    public function index(){
		$data['riwayat_konsultasi'] = $this->m_riwayat->tampil_data();
        $this->load->view('admin/riwayat_konsultasi', $data);
    }
}