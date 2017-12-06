<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_turno extends CI_Model {

	function __construct(){
		parent::__construct();
}	

public function verificar_id_ocupado_recente($data_, $periodo_){

/*===============================================[ contruind meu array de id de pessoas que ta na dia atual de ]==========================*/
$this->db->select('id_funcionario');
$this->db->distinct();
$this->db->where('data', $data_);
$this->db->where('periodo', $periodo_);
$res_p_=$this->db->get('turno')->result();

if ($res_p_) {

$b = array();  
foreach( $res_p_ as $a) {  //aqui pra formar nosso que da inicio a formacao do nosso array 
   $b[] = $a->id_funcionario; //formando ...
}
/*==============================================[fim de ]==================================*/
return $b;

}

else
{
return null;
}

}


public function lista_funcionario_diponivel($id_, $data, $periodo){

//$names = array(6, 5);
$id_busy=$this->verificar_id_ocupado_recente($data, $periodo);


$this->db->select('id_user, nome, funcao');
$this->db->distinct();  //isso dai pra permitir nao repiticao de nome e outros
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

 if ($id_busy!=null) {
   $this->db->where_not_in('id_user', $id_busy); //e pra lista menos id pegado em sima que verificamos que dia de hoje
 }
   

$this->db->join('turno', 'id_user=id_funcionario', 'left');
$res=$this->db->get('funcionario')->result();

return $res;

}


public function pesquisa_filtro($filtro, $id, $data, $periodo){

$id_busy=$this->verificar_id_ocupado_recente($data, $periodo);

$this->db->select('*');
$this->db->group_start();
$this->db->where('funcao!=', 'adim');
$this->db->where('id_user!=', $id);
$this->db->group_start();
$this->db->where('data!=', $data);
$this->db->or_where('data', $data);
$this->db->where('periodo!=', $periodo);

$this->db->or_where('data', null);
$this->db->or_where('periodo', null);

$this->db->group_end();

$this->db->like('nome', $filtro);
$this->db->not_like('funcao', 'adim');
$this->db->or_like('funcao', $filtro);
$this->db->where('funcao!=', 'adim');

$this->db->group_end();

 if ($id_busy!=null) {
   $this->db->where_not_in('id_user', $id_busy); //e pra lista menos id pegado em sima que verificamos que dia de hoje
 }

$this->db->join('turno', 'id_user=id_funcionario', 'left');

$res=$this->db->get('funcionario')->result();

return $res;

  }

public function funcionario_y_n_turno($data, $periodo, $id){

$this->db->select('*');
$this->db->where('id_funcionario', $id);
$this->db->where('data', $data);
$this->db->where('periodo', $periodo);

$res=$this->db->get('turno')->result();

if ($res) {
 return true;
} 
else {
  return false;
}

}



public function criar_turno($date, $verificar){

$this->db->select('*');
$this->db->where($verificar);
$res=$this->db->get('turno')->result();

if ($res) 
 {              
  return null;
 }

              else{
               
               $inserir=$this->db->insert('turno', $date);

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
$resp=$this->db->update('turno', $data);

if ($resp) {
    return true;
}

else{
    return false;
}

}


public function remover_turno($id_turno_){
   $this->db->where('id_turno', $id_turno_);
   $resl=$this->db->delete('turno');
   return $resl;
  }  


public function lista_turno($data, $periodo){
$this->db->select('*');
$this->db->where('data', $data);
$this->db->where('periodo', $periodo);
$this->db->order_by("funcao_");

$this->db->join('funcionario', 'id_funcionario=id_user');
$res=$this->db->get('turno')->result();
return $res;

}

public function info_turno($data){

$this->db->select('*');
$this->db->where($data);
$this->db->join('funcionario', 'id_user=id_funcionario', 'left');
$this->db->order_by('funcao', 'desc');
$res=$this->db->get('turno')->result();

return $res;
}


public function lista_turno_loja_($limit, $start){   //para listar por limite

$this->db->select('loja, data, periodo');
$this->db->group_by('data');
$this->db->group_by('periodo');
$this->db->group_by('loja');
$this->db->order_by('data', 'desc');
$this->db->order_by('periodo', 'asc');
$this->db->limit($limit, $start);
$res=$this->db->get('turno')->result();
return $res;

}

//para paginacao
public function counta_all_lista_turno_loja_(){   //countar quantidade de turno diacordo com resultado

$this->db->select('loja, data, periodo');
$this->db->group_by('data');
$this->db->group_by('periodo');
$this->db->group_by('loja');
$this->db->order_by('data', 'desc');
$this->db->order_by('periodo', 'desc');
//$respp=$this->db->count_all('turno');  isso e pra contar todos 
$respp=$this->db->count_all_results('turno');  //isso e pra countar resultados

return $respp;
}


public function pesquisa_turnos_($filtro_){

$this->db->select('loja, data, periodo');

$this->db->like('loja', $filtro_);
$this->db->or_like('periodo', $filtro_);
$this->db->or_where('data', $filtro_);

$this->db->group_by('data');
$this->db->group_by('periodo');
$this->db->group_by('loja');
$this->db->order_by('data', 'desc');
$this->db->order_by('periodo', 'desc');
$res=$this->db->get('turno')->result();

return $res;
  }

/*=======================================================================[Rascunho]=====================================================*/

/*

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

public function lm(){ 

$this->db->select('loja, data, periodo');
$this->db->group_by('data');
$this->db->group_by('periodo');
$this->db->group_by('loja');
$res=$this->db->get('turno')->result();
return $res;

}
*/
/*=======================================================================[Rascunho]=====================================================*/
}

/* End of file model_turno.php */
/* Location: ./application/models/model_turno.php */

//teste
