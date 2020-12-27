<?php
class M_listtopik extends CI_model{
    protected $tabel = 'tb_chat';
    public function tampil_data()
    {
        $this->db->select('tb_mhs.nama_mhs, tb_chat.topik_chat, tb_chat.id_chat, tb_chat.status_chat');
        $this->db->select('tb_chat.tgl_chat');
        $this->db->join('tb_mhs','tb_chat.id_mhs=tb_mhs.id_mhs');
        if(isset($this->session->userdata('userdata')['id_mhs'])){
            $this->db->where("tb_chat.id_mhs", $this->session->userdata('userdata')['id_mhs']);
            // $this->db->where("tb_chat.status_chat", "1");
        }else if(isset($this->session->userdata('userdata')['id_doswal'])) {
            $this->db->where("tb_mhs.id_doswal", $this->session->userdata('userdata')['id_doswal']);
            $this->db->where("tb_chat.status_chat", "1");
        }else {
            $this->db->where("tb_chat.id_kaprodi", $this->session->userdata('userdata')['id_kaprodi']);
            $this->db->where("tb_chat.status_chat", "2");
        }
        
        return $this->db->get("tb_chat")->result_array();
    }
}