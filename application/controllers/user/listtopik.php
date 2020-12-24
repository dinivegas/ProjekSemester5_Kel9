<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class listtopik extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('M_listtopik');
        }
        public function index()
        {
            $data['chat']=$this->M_listtopik->tampil_data();
            $data['mahasiswa']=$this->db->get('tb_mhs')->result();
            $this->load->view('user/listtopik', $data);
        }
}