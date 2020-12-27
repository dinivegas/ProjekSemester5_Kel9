<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_Admin extends CI_Controller{
    public function index(){
        $this->load->view('admin/pengaturan_admin');
    }
    public function ambildata($type){
    	if($type == 1){
    		$data = $this->db->query("SELECT *, nim_mhs as nomor FROM tb_mhs")->result_array();
    	}else if($type == 2){
    		$data = $this->db->query("SELECT *, nip_doswal as nomor FROM tb_dosenwali")->result_array();
    	}else{
    		$data = $this->db->query("SELECT *, nip_kaprodi as nomor FROM tb_kaprodi")->result_array();
    	}
    	echo json_encode($data);
    }
    public function reset_password(){
    	$nomor = $this->input->post('identitas');
    	$type = $this->input->post('type');
    	if($type == 1){
    		$table = 'tb_mhs';
    		$arr   = ['password_mhs' => $nomor];
    		$where = ['nim_mhs' => $nomor];
    	}else if($type == 2){
    		$table = 'tb_dosenwali';
    		$arr   = ['password_doswal' => $nomor];
    		$where = ['nip_doswal' => $nomor];
    	}else{
    		$table = 'tb_kaprodi';
    		$arr   = ['password_kaprodi' => $nomor];
    		$where = ['nip_kaprodi' => $nomor];
    	}
    	$this->session->set_flashdata('msg', 'Berhasil Ganti Password');
    	$ar = $this->db->update($table, $arr, $where);
    	redirect(base_url('admin/pengaturan_admin'));
	}
	public function aktivasi(){
        $this->load->view('admin/aktivasi');
        
	}
	public function aktivasi_akun(){
		$nomor = $this->input->post('identitas');
		$type = $this->input->post('type');
		if($type == 1){
    		$table = 'tb_mhs';
    		$arr   = ['status' => 1];
    		$where = ['nim_mhs' => $nomor];
    	}else if($type == 2){
    		$table = 'tb_dosenwali';
    		$arr   = ['status' => 1];
    		$where = ['nip_doswal' => $nomor];
    	}else{
    		$table = 'tb_kaprodi';
    		$arr   = ['status' => 1];
    		$where = ['nip_kaprodi' => $nomor];
    	}
		$this->db->update($table,  $arr, $where);
		$this->session->set_flashdata('msg', 'Berhasil Aktivasi Akun');
		redirect(base_url('admin/pengaturan_admin/aktivasi'));
	}
    public function nonaktifkan(){
        $this->load->view('admin/nonaktifkan');
        
    }
    public function nonaktifkan_akun(){
        $nomor = $this->input->post('identitas');
        $type = $this->input->post('type');
        if($type == 1){
            $table = 'tb_mhs';
            $arr   = ['status' => 0];
            $where = ['nim_mhs' => $nomor];
        }else if($type == 2){
            $table = 'tb_dosenwali';
            $arr   = ['status' => 0];
            $where = ['nip_doswal' => $nomor];
        }else{
            $table = 'tb_kaprodi';
            $arr   = ['status' => 0 ];
            $where = ['nip_kaprodi' => $nomor];
        }
        $this->db->update($table,  $arr, $where);
        $this->session->set_flashdata('msg', 'Berhasil Nonaktifkan Akun');
        redirect(base_url('admin/pengaturan_admin/nonaktifkan'));
    }
}
