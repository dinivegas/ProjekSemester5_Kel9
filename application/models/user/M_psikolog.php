<?php

class M_psikolog extends CI_Model {

    public function tampil_data(){
        $query = "SELECT * FROM tb_psikolog";
        return $this->db->query($query)->result();
        return $this->db->get('tb_psikolog');
        return $query;
        
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }



}