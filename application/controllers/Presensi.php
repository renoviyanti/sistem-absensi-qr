<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presensi extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
  			redirect('auth');
  		}
        $this->load->model('Presensi_model');
        $this->load->library('form_validation');
        $this->user = $this->ion_auth->user()->row();
    }

    public function index()
    {
        $user = $this->user;
        $presensi = $this->Presensi_model->get_all_query();

        $data = array(
            'presensi_data' => $presensi,
            'user' => $user,'users' 	=> $this->ion_auth->user()->row(),

        );

        $this->template->load('template','presensi_list', $data);
    }
 public function sortir()
    {
        $user = $this->user;
        $presensi = $this->Presensi_model->sort_tgl();

        $data = array(
            'presensi_data' => $presensi,
            'user' => $user,'users'     => $this->ion_auth->user()->row(),

        ); 

        $this->template->load('template','presensi_list', $data);        

    }

}

/* End of file Presensi.php */
/* Location: ./application/controllers/Presensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-03 13:03:02 */
/* http://harviacode.com */
