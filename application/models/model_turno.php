<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_turno extends CI_Model {

	function __construct(){
		parent::__construct();
}	


public function lista_funcionario_diponivel($id_, $data, $periodo){

$this->db->select('*');

$this->db->group_start();
$this->db->where('funcao!=', 'adim');
$this->db->where('id_user!=', $id_);

$this->db->group_start();
$this->db->where('data!=', $data);
$this->db->or_where('data', $data);
$this->db->where('periodo!=', $periodo);

$this->db->or_where('data', null);
$this->db->or_where('periodo', null);

$this->db->group_end();

$this->db->group_end();

$this->db->join('turno_text', 'id_user=id_users', 'left');

$res=$this->db->get('funcionario_text')->result();

return $res;

}

public function pesquisa_filtro($filtro){

$this->db->select('*');
$this->db->like('nome', $filtro);

$this->db->not_like('funcao', 'adim');
$this->db->or_like('funcao', $filtro);

$this->db->where('funcao!=', 'adim');
$res=$this->db->get('funcionario_text')->result();
return $res;

  }


public function criar_turno($date, $verificar){

$this->db->select('*');
$this->db->where($verificar);
$res=$this->db->get('turno_text')->result();

                //return $res;
 if ($res) 
 {              
return null;
 }

              else{
               
               $inserir=$this->db->insert('turno_text', $date);

                if ($inserir) {
                return true;
                }

                else{
                return false;
                }
 }
             
           
//========================================================================================
}

public function alterar_turno($data, $id_){

$this->db->where('id_turno', $id_);
$resp=$this->db->update('turno_text', $data);

if ($resp) {
    return true;
}

else{
    return false;
}

}


public function remover_turno($id_turno_){
   $this->db->where('id_turno', $id_turno_);
   $resl=$this->db->delete('turno_text');
   return $resl;
  }  

public function lista_turno(){
$this->db->select('*');
$this->db->order_by("funcao_");
$res=$this->db->get('turno_text')->result();
return $res;

}



/*=======================================================================[Rascunho]=====================================================*/

public function lista_disponivel($data, $periodo){

$this->db->select('*');

$this->db->where('data!=', $data);

$this->db->or_where('data', $data);
$this->db->where('perido!=', $periodo);

$this->db->or_where('data', null);
$this->db->or_where('perido', null);

$this->db->join('turn', 'id_func=id_funcs', 'left');
$res=$this->db->get('func')->result();
return $res;

}
/*=======================================================================[Rascunho]=====================================================*/
}

/* End of file model_turno.php */
/* Location: ./application/models/model_turno.php */

//teste
