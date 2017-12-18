<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_turno extends CI_Model {

	function __construct(){
		parent::__construct();
}	

  public function pega_loja($hostname){

$this->db->select('id_lojja, zona, hostmane');
$this->db->like('hostmane', $hostname);
$this->db->join('maquina', 'id_lojja=id_loja');
$res=$this->db->get('loja')->result();
//return $res;


if ($res) {
 foreach( $res as $a) {  //aqui pra formar nosso que da inicio a formacao do nosso array 
   $loja = $a->id_lojja; //formando ...
}

} 
else {
  $loja=null;
}

return $loja;
}

public function verificar_id_ocupado_recente($data_){

/*===============================================[ contruind meu array de id de pessoas que ta na dia atual de ]==========================*/
$this->db->select('id_funcionario');
$this->db->distinct();
$this->db->where('data', $data_);
$this->db->where('Disponivel', 1);
$res_p_=$this->db->get('turno')->result();

if ($res_p_) {

$b = array();  
foreach( $res_p_ as $a) {  //aqui pra formar nosso que da inicio a formacao do nosso array 
   $b[] = $a->id_funcionario; //formando ...
}
return $b;
}

else
{

return null;
  }

}
/*==============================================[fim de ]==================================*/



/*================================================[]===========================================*/
public function verificar_periodo($data_, $id_){

/*===============================================[ contruind meu array de id de pessoas que ta na dia atual de ]==========================*/
$this->db->select('periodo');
$this->db->distinct();
$this->db->where('data', $data_);
$this->db->where('id_funcionario', $id_);
$this->db->where('Disponivel', 1);
$resposta=$this->db->get('turno')->result();

if ($resposta) {

$b = array();  
foreach( $resposta as $a) {  //aqui pra formar nosso que da inicio a formacao do nosso array 
   $b[] = $a->periodo; //formando ...
}
return $b[0];
}

else
{

return null;
  }

}
/*================================================[]===========================================*/


public function lista_funcionario_diponivel($id_, $data){

//$names = array(6, 5);
$id_busy=$this->verificar_id_ocupado_recente($data);


$this->db->select('id_user, nome, funcao');
$this->db->distinct();  //isso dai pra permitir nao repiticao de nome e outros
$this->db->group_start();
$this->db->where('funcao!=', 'adim');
$this->db->where('id_user!=', $id_);
$this->db->group_start();
$this->db->where('data!=', $data);
$this->db->or_where('data', $data);
$this->db->where('Disponivel!=', 1);

$this->db->or_where('data', null);
$this->db->or_where('Disponivel', null);

$this->db->group_end();

$this->db->group_end();

 if ($id_busy!=null) {
   $this->db->where_not_in('id_user', $id_busy); //e pra lista menos id pegado em sima que verificamos que dia de hoje
 }
   

$this->db->join('turno', 'id_user=id_funcionario', 'left');
$res=$this->db->get('funcionario')->result();

return $res;

}


public function pesquisa_filtro($filtro, $id, $data){

$id_busy=$this->verificar_id_ocupado_recente($data);



$this->db->select('id_user, nome, funcao');
$this->db->distinct();  //isso dai pra permitir nao repiticao de nome e outros
$this->db->group_start();
$this->db->where('funcao!=', 'adim');
$this->db->where('id_user!=', $id);
$this->db->group_start();
$this->db->where('data!=', $data);
$this->db->or_where('data', $data);
$this->db->where('Disponivel!=', 1);

$this->db->or_where('data', null);
$this->db->or_where('Disponivel', null);

$this->db->group_end();

$this->db->like('nome', $filtro);
$this->db->not_like('funcao', 'adim');
$this->db->or_like('funcao', $filtro);
$this->db->where('funcao!=', 'adim');

$this->db->group_end();

 if ($id_busy) {
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

$this->db->group_start();

$this->db->where('periodo', $periodo);
$this->db->where('Disponivel', 1);

$this->db->or_group_start();
$this->db->where('periodo!=', $periodo);
$this->db->where('Disponivel', 1);

$this->db->or_group_start();
$this->db->where('periodo', $periodo);
$this->db->where('Disponivel', 0);

$this->db->group_end();
$this->db->group_end();
$this->db->group_end();

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


public function lista_turno($data, $loja_id, $id){  //tem que listar mediante a 
$periodo=$this->verificar_periodo($data, $id);

$this->db->select('*');
$this->db->where('data', $data);
$this->db->where('periodo', $periodo);
if ($loja_id) {
 $this->db->where('id_loja', $loja_id);
} 
else {
 
}

$this->db->order_by("funcao_");
$this->db->join('funcionario', 'id_funcionario=id_user');
$this->db->join('loja', 'id_loja=id_lojja');
$res=$this->db->get('turno')->result();
return $res;

}

public function lista_turno_detalhes(){
 $this->db->select('*');
 $this->db->order_by('id_turno', 'desc');
  $this->db->order_by('periodo', 'desc');
$this->db->join('funcionario', 'id_funcionario=id_user');
$this->db->join('loja', 'id_loja=id_lojja');
$res=$this->db->get('turno')->result();
return $res; 

}

public function info_turno($data){

$this->db->select('*');
$this->db->where($data);
$this->db->join('funcionario', 'id_user=id_funcionario', 'left');
$this->db->join('loja', 'id_loja=id_lojja');
$this->db->order_by('funcao', 'desc');
$res=$this->db->get('turno')->result();
return $res;
}

public function pdf($id_turno){

$this->db->select('*');
$this->db->where('id_turno', $id_turno);
$this->db->join('loja', 'id_loja=id_lojja');
$res=$this->db->get('turno')->result();
return $res;
}

public function lista_turno_loja_($limit, $start){   //para listar por limite

$this->db->select('id_loja ,zona, data, periodo, Disponivel,  congelado, id_turno');
$this->db->group_by('data');
$this->db->group_by('periodo');
$this->db->group_by('zona');
$this->db->group_by('Disponivel');
$this->db->order_by('data', 'desc');
$this->db->order_by('periodo', 'desc');
$this->db->limit($limit, $start);
$this->db->join('loja', 'id_loja=id_lojja');
$res=$this->db->get('turno')->result();
return $res;

}

//para paginacao
public function counta_all_lista_turno_loja_(){   //countar quantidade de turno diacordo com resultado

$this->db->select('zona, data, periodo');
$this->db->group_by('data');
$this->db->group_by('periodo');
$this->db->group_by('zona');
$this->db->order_by('data', 'desc');
$this->db->order_by('periodo', 'desc');
//$respp=$this->db->count_all('turno');  isso e pra contar todos 
$this->db->join('loja', 'id_loja=id_lojja');
$respp=$this->db->count_all_results('turno');  //isso e pra countar resultados

return $respp;
}


public function pesquisa_turnos_($filtro_){

$this->db->select('zona, data, periodo');

$this->db->like('zona', $filtro_);
$this->db->or_like('periodo', $filtro_);
$this->db->or_where('data', $filtro_);

$this->db->group_by('data');
$this->db->group_by('periodo');
$this->db->group_by('zona');
$this->db->order_by('data', 'desc');
$this->db->order_by('periodo', 'desc');
$this->db->join('loja', 'id_loja=id_lojja');
$res=$this->db->get('turno')->result();

return $res;
  }

 public function elementos_contruido_turno($id, $loja_id, $data)
{
$periodo=$this->verificar_periodo($data, $id);

$this->db->select('id_turno');
$this->db->where('periodo', $periodo);
$this->db->where('Disponivel', 1);
$this->db->where('id_loja', $loja_id);

$res_p_=$this->db->get('turno')->result();

if ($res_p_) {
$b = array();  
foreach( $res_p_ as $a) {  
   $b[] = $a->id_turno; 
} return $b;}
else{ return null; }

}

 public function fecho_turno($id, $loja_id, $data)
{
  $datap['Disponivel']=0; 

  $id_s=$this->elementos_contruido_turno($id, $loja_id, $data);

   if ($id_s) {
   $this->db->where_in('id_turno', $id_s); //e pra lista menos id pegado em sima que verificamos que dia de hoje
}

    $resp=$this->db->update('turno', $datap);
    
    return $resp; 
 } 


public function verifica_fecho_hora_turno($id, $loja_id, $data)
{
  $id_s=$this->elementos_contruido_turno($id, $loja_id, $data);

  $this->db->select('funcao_');

$this->db->group_start();
  $this->db->where('hora_entrada', null);
  $this->db->or_where('hora_entrada', '');

  $this->db->where('hora_saida', null);
  $this->db->or_where('hora_saida', '');

$this->db->or_group_start();
  $this->db->where('hora_entrada', null);
  $this->db->where('hora_saida!=', null);

$this->db->or_group_start();
  $this->db->where('hora_entrada!=', null);
  $this->db->where('hora_saida', null);

  $this->db->group_end();
  $this->db->group_end();
  $this->db->group_end();

   if ($id_s) {
   $this->db->where_in('id_turno', $id_s); 
    } 
  $this->db->where('id_loja', $loja_id);  

   $respp=$this->db->count_all_results('turno'); 

return $respp;
 } 


public function Relatorio($id, $id_loja, $data)
{

$this->db->where('id_loja', $id_loja);
$this->db->where('id_funcionario', $id);
$this->db->where('Disponivel', 1);

$resp=$this->db->update('turno', $data);

if ($resp) {
    return true;
}

else{
    return false;
}

}

/*================================[/countar quantidade de turno diacordo com resultado]===============================*/

public function count_turno_ativado($loja_id, $data_atual){   
$this->db->select('*');

$this->db->where('data', $data_atual);
$this->db->where('id_loja', $loja_id);
$this->db->where('disponivel', 0);

$this->db->group_by('data');
$this->db->group_by('periodo');
$respp=$this->db->count_all_results('turno');  
return $respp;
}
/*================================[/countar quantidade de turno diacordo com resultado]===============================*/


/*==================================================[lagout]============================================*/
public function logout($id, $data, $loja_id)
{

$this->db->where('id_funcionario', $id);
$this->db->where('data', $data);
$this->db->where('id_loja', $loja_id);
$this->db->where('Disponivel', 1);

$respost=$this->db->get('turno')->result();
 
 if ($respost) {
   return true;
 } 
 else {
   return false;
 }
 

  }
/*==================================================[]============================================*/



}

/* End of file model_turno.php */
/* Location: ./application/models/model_turno.php */

//teste
