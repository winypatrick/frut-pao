<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turno extends CI_Controller {

	public function __construct()
  {
          parent::__construct();
          $this->load->model('model_turno', 'turno');
          
  }

	public function index()
	{
		
	}

	public function lista_funcionario_diponivel()
	{

date_default_timezone_set('Atlantic/Cape_Verde'); 

$id=$this->session->userdata('userr_id');

$data=date('d/m/Y');

$time=date('H') ;

if ($time>=6 && $time<=14 ) {
$periodo = 1 ;
}

else{
$periodo = 2 ;  
}

 $pega=$this->turno->lista_funcionario_diponivel($id, $data, $periodo);

 echo json_encode($pega);

	}

  public function pesquisa_filtro()
  {
$filtro=$this->input->post('campo_pesquisa');    
$pega=$this->turno->pesquisa_filtro($filtro);
if ($pega) {
 echo json_encode($pega);
}
else{
  echo false;
}
 //echo 'ok'.$filtro;
  }

  public function remover_turno()
  {
   $id_turno_=$this->input->post('id_turno');
   $request=$this->turno->remover_turno($id_turno_);

   if ($request) {
    echo true; 
   }

   else{
    echo false;
   }


  }  

public function criar_turno()
{
$id_recebedo=$this->input->post('id_userr');

 $id=$this->session->userdata('userr_id');


$data['nome_']=$this->input->post('nome');
/*$data['funcao_']=$this->input->post('funcao');*/

if ($id_recebedo==$id) {
 $data['funcao_']='Responsavel';
}

else{
 $data['funcao_']='Assistente';
}

$data['loja']=$this->input->post('loja');
$data['data']=$this->input->post('data');
$data['periodo']=$this->input->post('periodo');
$data['id_users']=$id_recebedo;

$array_verificar = array('nome_'=>$data['nome_'], 'data'=>$data['data'], 'periodo'=>$data['periodo']);

$request=$this->turno->criar_turno($data, $array_verificar);

  if ($request==null) {
      echo 'null';
   }

 else{
     if ($request==true) {
      echo true;
  }

    if ($request==false) {
      echo false;
  }
 }

 }



public function alterar_turno(){

$id_=$this->input->post('id_turno');
$data['hora_entrada']=$this->input->post('hora_entrada');
$data['hora_saida']=$this->input->post('hora_saida');

$req=$this->turno->alterar_turno($data, $id_);

  if ($req==true) {
   echo true;
  }

  else
  {
    echo false;
  }


}


public function lista_turno() {

 $id=$this->session->userdata('userr_id');

$pega=$this->turno->lista_turno();
//partepe poi na datatable costumiza e fxtmb

 foreach ($pega as $k) {

     $r= array();
     
       $r[]= '<span >'.$k->nome_.'</span>';

       if ($k->funcao_=='Assistente' || $k->funcao_=='') {

      $r[]= '<span style="font-weight: bold; border-color: #070707; border: 1px;border-left: 0px; border-right: 0px; border-top: 0px; border-style: solid; margin-left:17px">A</span>';

       }

       else{

      $r[]= '<span style="font-weight: bold; border-color: #070707; border: 1px;border-left: 0px; border-right: 0px; border-top: 0px; border-style: solid; margin-left:17px">R</span>';
       }

       //$r[]= '<span >'.$k->funcao_.'</span>';

       $r[]= '<span >'.$k->loja.'</span>';
       $r[]= '<span >'.$k->data.'</span>';
       $r[]= '<span >'.$k->periodo.' °</span>';
       $r[]= '<span >'.$k->hora_entrada.'</span>';
       $r[]= '<span >'.$k->hora_saida.'</span>';
      
if ($id!=$k->id_users) {
       $r[]='<a class="fa fa-pencil-square-o btn btn-group  text-warning " onclick="altera_r(\''.$k->id_turno.'\', \''.$k->nome_.'\', \''.$k->hora_entrada.'\', \''.$k->hora_saida.'\')"></a> <a class="fa fa-user-times  btn btn-group text-danger" onclick="deleta_turno(\''.$k->id_turno.'\')"></a>';
      }
else{
       $r[]='<a class="fa fa-pencil-square-o btn btn-group  text-warning " onclick="altera_r(\''.$k->id_turno.'\', \''.$k->nome_.'\', \''.$k->hora_entrada.'\', \''.$k->hora_saida.'\')"></a> <span  class="fa fa-user-times btn btn-group " style="color:#868080" ></span>';
}            

       
       $dados []=$r;
      
     }

 $output = array('data' => $dados); 
 echo json_encode($output);

}


 public function pega_info_logado()  //pega id_user loagdo
{
    $id=$this->session->userdata('userr_id');
    $nome=$this->session->userdata('_nome');
    $funcao=$this->session->userdata('_funcao');

/*passos para formar seu json esto e importante */
   $output = array('id' => $id, 'nome' => $nome, 'funcao'=>$funcao); 

   $outputt = array('data'=>$output);  //poi sena em json

   echo json_encode($outputt);

   /*fim*/
}

 /*=======================================================================[Rascunho]=====================================================*/
public function lista_disponivel(){

date_default_timezone_set('Atlantic/Cape_Verde');  //hora de Time_zone Cap verd
//echo date('d/m/Y') ; echo date('H') ; echo date('H');

$data=date('d/m/Y');

$time=date('H') ;

if ($time>=6 && $time<=14 ) {
$periodo = 1 ;
}

else{
$periodo = 0 ;  
}


$r=$this->turno->lista_disponivel($data, $periodo);
echo json_encode($r);

//echo $data.''.$periodo ;
}
/*=======================================================================[Rascunho]=====================================================*/
}

/* End of file turno.php */
/* Location: ./application/controllers/turno.php */