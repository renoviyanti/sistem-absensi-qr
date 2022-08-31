<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Genbar_Model extends CI_model {

	public function getShow($id_komunitas)
	{
		$this->db->where('id_komunitas',$id_komunitas);
		$hasil=$this->db->get('komunitas');
		return $hasil;

	}


	public function getshow_query($id_komunitas)

	{
  	return $this->db->where('id_komunitas',$id_komunitas)->get('komunitas');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
 