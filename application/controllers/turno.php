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

      
if ($id!=$k->id_users && $k->funcao_=='Assistente') {

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

/*  ==================lista de turno loja============*/
public function lista_turno_loja_(){

$r=$this->turno->lista_turno_loja_($limit, $start);
echo json_encode($r);

}

/*====================count turn======================*/
public function counta_all_lista_turno_loja_(){

$r_=$this->turno->counta_all_lista_turno_loja_();
echo $r_;

}


public function paginacao_(){  //aqui e para fazer pagicao

$this->load->library('pagination');

$resq=$this->turno->counta_all_lista_turno_loja_();


$config = array();
$config['base_url'] = '';
$config['total_rows'] = $resq;
$config['per_page'] =10;
$config['uri_segment'] = 3;
$config['use_page_numbers'] = TRUE;
$config['full_tag_open'] = ' <ul class="pagination">';
$config['first_link'] = '<span style="font-weight: bold; font-size: 12px; color: #2ECDC4">Primeira</span>';  
$config['last_link'] = '<span style="font-weight: bold; font-size: 13px; color: #2ECDC4">Ultima</span>';
$config['full_tag_close'] = '</ul>';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';
$config['next_link'] = '<span style="font-weight: bold; font-size: 14px; color: #2ECDC4"> &gt; </span>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['prev_link'] = '<span style="font-weight: bold; font-size: 14px; color: #2ECDC4"> &lt; </span>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['cur_tag_open'] = ' <li class="active"><a href="#" style="color: #FFFFFF; font-weight: bold;">';
$config['cur_tag_close'] = ' </a></li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['num_links'] = 1;

$this->pagination->initialize($config);
$pagina=$this->uri->segment(3);
$start= ($pagina-1) * $config['per_page'];

$output = array(
  'pagina_link' => $this->pagination->create_links(),
  'tabela' => $this->turno->lista_turno_loja_($config['per_page'], $start)
);
echo json_encode($output);

}



public function pesquisa_turnos_()
  {
$filtro_=$this->input->post('campo_pesquisa_1');    
$pega_=$this->turno->pesquisa_turnos_($filtro_);

if ($pega_) {
 echo json_encode($pega_);
}
else{
  echo false;
}

  }

 /*=======================================================================[Rascunho]=====================================================*/
/*
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

public function lm(){
$r=$this->turno->lm();
echo json_encode($r);
}
*/


/*=======================================================================[Rascunho]=====================================================*/
}

/* End of file turno.php */
/* Location: ./application/controllers/turno.php */