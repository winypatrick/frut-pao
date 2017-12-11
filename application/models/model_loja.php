<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Model_loja extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  } 

  public function insert_loja($dados,$contacto)
  {
    $this->db->select('*');
    $this->db->where('contacto',$contacto);
    $loja = $this->db->get('loja')->result();

   if ($loja) {
      return false;
    }else if($this->db->insert('loja', $dados)){
        return true;
      }else {
        return false;
      }
    }

  public function list_loja()
  {
    $this->db->select('*');
    //$this->db->where('estado!=',0); // 1 - activo 0 -  fechado
    $rst = $this->db->get('loja')->result();
    return $rst;
  }

  public function list_loja_id($id)
  {
    $this->db->select('*');
    $this->db->where('id_lojja',$id);
    $rst = $this->db->get('loja')->result();
    return $rst;
  }

 public function update_loja($dados,$id)
{
  $this->db->select('*');
  $this->db->where('id_lojja',$id);
  $rst = $this->db->update('loja', $dados);
  
  if ($rst) {
    return true;
  }
  else{
    return false;
  }
}


  public function remove_loja($dados,$id){
    $this->db->select('*');
    $this->db->where('id',$id);
    $loja = $this->db->get('loja')->result();

    /*if ($loja) {
      return false;
    }else if(){//remove loja
      return;
    }*/
  }

}
