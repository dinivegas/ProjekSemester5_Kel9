<?php

class M_riwayat extends CI_Model {

    public function tampil_data(){
        $query = "SELECT * FROM tb_chat";
        return $this->db->query($query)->result();
        return $this->db->get('tb_chat');
    }

}