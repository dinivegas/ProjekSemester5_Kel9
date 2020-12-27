<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

class Konsultasi extends CI_Controller {

<<<<<<< Updated upstream
    public function index($id)
    {
        // print_r($this->session->userdata('userdata'));
        $data = array(
            'data' => $this->db->query("SELECT * FROM `tb_chat` tc LEFT JOIN tb_mhs mhs ON tc.id_mhs=mhs.id_mhs 
            LEFT JOIN tb_dosenwali dw ON tc.id_doswal=dw.id_doswal 
            LEFT JOIN  tb_kaprodi tk ON tc.id_kaprodi=tk.id_kaprodi 
            LEFT JOIN tb_pusatkarir tp ON tc.id_pusatkarir=tp.id_pusatkarir
            LEFT JOIN tb_psikolog tpsi ON tc.id_psikolog=tpsi.id_psikolog where tc.id_chat = $id AND  tc.id_mhs=".$this->session->userdata('userdata')['id_mhs']." ORDER BY tc.status_chat asc")->row_array()
        );
        // 
        $id_chat = (isset($data['data']['id_chat']) ? $data['data']['id_chat'] : 0);
        // 
        $data['chat'] = $this->db->query("SELECT * FROM tb_detail_chat dc JOIN tb_chat tc ON dc.id_chat=tc.id_chat WHERE tc.id_chat = '$id_chat'")->result();
=======
    public function index()
    {
        // print_r($this->session->userdata('userdata'));
        $data = array(
            'chat' => $this->db->order_by('id','DESC')->get('chat')->result() 
        );
        
        
>>>>>>> Stashed changes
        $this->load->view('user/konsultasi', $data);
    }

    public function store(){
        $data = array(
<<<<<<< Updated upstream
            'id_chat' => $this->input->post('id_chat'),
            'isi_chat' => $this->input->post('message'),
            //tidakusah yang bawah
            'level' => (isset($this->session->userdata('userdata')['id_mhs']) ? 1 : (isset($this->session->userdata('userdata')['id_doswal']) ? 2 : 3)),
            'tanggal_chat' => date('Y-m-d H:i:s')
            //batas tidak usah
        );
        // print_r($data) ;
=======
            'nama' => $this->input->post('nama'),
            'message' => $this->input->post('message'),
        );

>>>>>>> Stashed changes
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
          );
          $pusher = new Pusher\Pusher(
            'a07f7d661e8689f142b8',
            '2753f5f108972d9cc2f6',
            '1121750',
            $options
          );

<<<<<<< Updated upstream
        if($this->db->insert('tb_detail_chat', $data)){
          $push = $this->db->order_by('id_detail_chat','DESC');
          $push = $this->db->get('tb_detail_chat')->result( );
=======
        if($this->db->insert('chat', $data)){
          $push = $this->db->order_by('id','DESC');
          $push = $this->db->get('chat')->result( );
>>>>>>> Stashed changes

          foreach ($push as $key) {
              $data_pusher[] = $key;
          }

            $pusher->trigger('my-channel', 'my-event', $data_pusher);
        
<<<<<<< Updated upstream
        }
    }
    // 
    public function simpan_topik(){
        $d = $_POST;
        $data = [
            'topik_chat' => $d['topik'],
            'id_mhs' => $this->session->userdata('userdata')['id_mhs'],
            'id_doswal' => 1,
            'id_kaprodi' => 1,
            'id_pusatkarir' => 1,
            'id_psikolog' => 1,
            'status_chat' => 1,
        ];
        $insert = $this->db->insert('tb_chat', $data);
        redirect(base_url('user/listtopik'));
    }
    // 

    // update lagi gaes
    public function topik(){
        $data = array(
            'data' => $this->db->query("SELECT * FROM `tb_chat` tc LEFT JOIN tb_mhs mhs ON tc.id_mhs=mhs.id_mhs 
            LEFT JOIN tb_dosenwali dw ON mhs.id_doswal=dw.id_doswal 
            LEFT JOIN tb_kaprodi tk ON tc.id_kaprodi=tk.id_kaprodi 
            LEFT JOIN tb_pusatkarir tp ON tc.id_pusatkarir=tp.id_pusatkarir
            LEFT JOIN tb_psikolog tpsi ON tc.id_psikolog=tpsi.id_psikolog WHERE mhs.id_mhs=".$this->session->userdata('userdata')['id_mhs']." ORDER BY tc.status_chat asc")->row_array()
        );
        // echo "<pre>";
        // print_r($data);
        $this->load->view('user/tambah_konsultasi', $data);
=======
        } 
>>>>>>> Stashed changes
    }
}