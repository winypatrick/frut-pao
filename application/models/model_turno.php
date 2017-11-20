<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_turno extends CI_Model {

	function __construct(){
		parent::__construct();
}	


public function lista_funcionario_diponivel( ){

$this->db->select('*');
$this->db->where('funcao!=', 'adim');
$res=$this->db->get('funcionario_text')->result();
return $res;
}

public function pesquisa_filtro($filtro)
  {

$this->db->select('*');
$this->db->like('nome', $filtro);

$this->db->not_like('funcao', 'adim');
$this->db->or_like('funcao', $filtro);

$this->db->where('funcao!=', 'adim');
$res=$this->db->get('funcionario_text')->result();
return $res;

  }


public function criar_turno($date, $verificar, $catch_func){

$this->db->select('*');
$this->db->where($verificar);
$res=$this->db->get('turno_text')->result();

//=========================================================================================
if ($catch_func==0) {

                if ($res) {

                //return $res;
                $inserir=$this->db->insert('turno_text', $date);

                if ($inserir) {
                return true;
                }

                else{
                return false;
                }

              }

              else{
               return null;
              }

}
//========================================================================================
else{

               if ($res) {
                
               return null;

              }

              else{
               
                //return $res;
                $inserir=$this->db->insert('turno_text', $date);

                if ($inserir) {
                return true;
                }

                else{
                return false;
                }
              }

}             
//========================================================================================
}

 public function remover_turno($id_turno_)
  {
   $this->db->where('id_turno', $id_turno_);
   $resl=$this->db->delete('turno_text');
   return $resl;
  }  

public function lista_turno(){


$this->db->select('*');
$this->db->order_by("funcao");
$res=$this->db->get('turno_text')->result();
return $res;

}

}

/* End of file model_turno.php */
/* Location: ./application/models/model_turno.php */