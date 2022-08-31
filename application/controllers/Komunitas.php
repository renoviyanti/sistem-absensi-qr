<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komunitas extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        if (!$this->ion_auth->logged_in()){
  			redirect('auth');
  		}
        $this->load->model('Komunitas_model');
        $this->load->library('form_validation','ion_auth');
        $this->load->helper('url');
        $this->user = $this->ion_auth->user()->row();

    }

    public function messageAlert($type, $title) {
      $messageAlert = "
      const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 5000
      });

      Toast.fire({
          type: '".$type."',
          title: '".$title."'
      });
      ";
      return $messageAlert;
  }

    public function index()
    {
        $user = $this->user;
        $komunitas = $this->Komunitas_model->get_all();
        $data = array(
            'komunitas_data' => $komunitas,
            'user' => $user,'users' 	=> $this->ion_auth->user()->row(),

        );

        $this->template->load('template','komunitas_list', $data);
    }


    public function create() {
      $user = $this->user;
        $data = array(
            'button' => 'Create',
            'action' => site_url('komunitas/create_action'),
            'id' => set_value('id'),
      	    'id_komunitas' => set_value('id_komunitas'),
      	    'nama_komunitas' => set_value('nama_komunitas'),
            'email_komunitas'=> set_value('email_komunitas'),
            'user' => $user,'users' 	=> $this->ion_auth->user()->row(),
	       );
        $this->template->load('template','komunitas_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'id_komunitas' => $this->input->post('id_komunitas',TRUE),
        		'nama_komunitas' => $this->input->post('nama_komunitas',TRUE),
            'email_komunitas'=> $this->input->post('email_komunitas', TRUE),
	         );
          $this->Komunitas_model->insert($data);
          $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambahkan komunitas'));
          redirect(site_url('komunitas'));
        }
    }

    public function update($id)
    {
      $user = $this->user;
        $row = $this->Komunitas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('komunitas/update_action'),
                'id' => set_value('id', $row->id),
            		'id_komunitas' => set_value('id_komunitas', $row->id_komunitas),
            		'nama_komunitas' => set_value('nama_komunitas', $row->nama_komunitas),
                'email_komunitas' => set_value('email_komunitas', $row->email_komunitas),
                'user' => $user,
                'users' 	=> $this->ion_auth->user()->row(),
	             );
            $this->template->load('template','komunitas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komunitas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_komunitas', TRUE));
        } else {
            $data = array(
            'id_komunitas' => $this->input->post('id_komunitas',TRUE),
        		'nama_komunitas' => $this->input->post('nama_komunitas',TRUE),
            'email_komunitas' => $this->input->post('email_komunitas', TRUE),
	    );

            $this->Komunitas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil merubah data komunitas'));
            redirect(site_url('komunitas'));
        }
    }

    public function delete($id)
    {
        $row = $this->Komunitas_model->get_by_id($id);

        if ($row) {
            $this->Komunitas_model->delete($id);
          $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menghapus data komunitas'));
            redirect(site_url('komunitas'));
        } else {
            $this->session->set_flashdata('messageAlert', $this->messageAlert('danger', 'data tidak ditemukan'));
            redirect(site_url('komunitas'));
        }
    }

      public function _rules()
      {
      	$this->form_validation->set_rules('id_komunitas', 'id komunitas', 'trim|required');
        $this->form_validation->set_rules('nama_komunitas', 'nama komunitas', 'trim|required');
        $this->form_validation->set_rules('email_komunitas', 'email_komunitas', 'trim|required');
      	$this->form_validation->set_rules('id', 'id', 'trim');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
      }



}

/* End of file Komunitas.php */
/* Location: ./application/controllers/Komunitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-18 03:21:05 */
/* http://harviacode.com */
