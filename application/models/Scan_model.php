<?php
  class Scan_model extends Ci_Model{

    function cek_id($id_komunitas){
        $query_str = "SELECT * FROM komunitas WHERE id_komunitas= ? ";
        $result = $this->db->query($query_str, array($id_komunitas));
          if ($result->num_rows()==1){
              return $result->row(0)->id_komunitas;
            }
            else{
              return false;
            }
    }

    function kom_abs_msk($id_komunitas){
        $query_str = "SELECT * FROM komunitas WHERE id_komunitas= ?";
        $result = $this->db->query($query_str,array($id_komunitas));
          if ($result->num_rows()==1) {
            $tgl=date('Y-m-d');
            $jam_msk=date('H:i:s');
            $id_khd = 1;
            $id_status = 1;
            $data=array(
              'id_komunitas' =>$id_komunitas,
              'tgl' => $tgl,
              'jam_msk' => $jam_msk,
              'id_khd'=> $id_khd,
              'id_status' => $id_status
            );
            $this->db->insert('presensi',$data);
            return $result->row(0)->id_komunitas;
          } else {
            return false;
      }
  }

      function kom_abs_klr($id_komunitas,$tgl){
        $query_str = "SELECT * FROM presensi WHERE id_komunitas= ? AND tgl= ?";
        $result = $this->db->query($query_str,array($id_komunitas,$tgl));
          if ($result->num_rows()==1) {
          $jam_klr=date('H:i:s');
          $id_status = 2;
          $data=array(
            'id_komunitas' =>$id_komunitas,
            'jam_klr' => $jam_klr,
            'id_status' => $id_status,
          );
          $this->db->where('id_komunitas',$id_komunitas);
          $this->db->where('tgl',$tgl);
          $this->db->update('presensi',$data);
          return $result->row(0)->id_komunitas;
            }
          else{
            return false;
          }
      }
  }





 ?>
