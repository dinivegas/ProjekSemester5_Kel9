<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kaprodi extends CI_Controller{

    public function index(){
        $this->load->view('admin/data_kaprodi');
    }
}