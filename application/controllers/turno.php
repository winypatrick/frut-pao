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

/*=====================================================pegando loja recente atual==========================*/

public function data_atual(){
date_default_timezone_set('Atlantic/Cape_Verde');
$data=date('d/m/Y');
return $data;
}

public function pega_loja(){

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$id_loja=$this->turno->pega_loja($hostname);

return $id_loja;
//echo $hostname;
}
/*=====================================================fim==========================================================*/

public function lista_funcionario_diponivel()
{

$id=$this->session->userdata('userr_id');

$data=$this->data_atual();

 $pega=$this->turno->lista_funcionario_diponivel($id, $data);

 echo json_encode($pega);

}

  public function pesquisa_filtro()
  {
date_default_timezone_set('Atlantic/Cape_Verde'); 
$id=$this->session->userdata('userr_id');
$data=date('d/m/Y');
$time=date('H') ;

if ($time>=6 && $time<=14 ) {$periodo = 1 ;}
else{$periodo = 2 ; }    
$filtro=$this->input->post('campo_pesquisa'); 

$pega=$this->turno->pesquisa_filtro($filtro, $id, $data, $periodo);
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

  public function merda(){
   $loja_id=$this->pega_loja();
   $data_atual=$this->data_atual();

  $count_turno=$this->turno->count_turno_ativado($loja_id, $data_atual);

   echo $count_turno;
} 

public function criar_turno()
{
//date_default_timezone_set('Atlantic/Cape_Verde');
$loja_id=$this->pega_loja();

if ($loja_id!=null) {

 $id_recebedo=$this->input->post('id_userr');
 $id=$this->session->userdata('userr_id');
 $data_atual=$this->data_atual();

$count_turno=$this->turno->count_turno_ativado($loja_id, $data_atual);

if ($count_turno < 2) {/*1*/
 $pega_periodo=$this->turno->verificar_periodo($data_atual, $id);
/*$data['funcao_']=$this->input->post('funcao');*/
if ($id_recebedo==$id) {
 $data['funcao_']='Responsavel';

}

else{
 $data['funcao_']='Assistente';
}

$data['id_loja']=$loja_id;
$data['data']=$this->input->post('data');
$data['periodo']=$this->input->post('periodo');
$data['id_funcionario']=$id_recebedo;
$data['Disponivel']=1;


if ($pega_periodo) {

  if ($pega_periodo==$data['periodo']) {

    $array_verificar = array('id_funcionario'=>$data['id_funcionario'], 'data'=>$data['data'], 'Disponivel'=>$data['Disponivel']);

//print_r($array_verificar );

$request=$this->turno->criar_turno($data, $array_verificar);

  if ( $request==='') {
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


  else{
   echo 'never';
  }

  
}

else{

$array_verificar = array('id_funcionario'=>$data['id_funcionario'], 'data'=>$data['data'], 'Disponivel'=>$data['Disponivel']);

//print_r($array_verificar );

$request=$this->turno->criar_turno($data, $array_verificar);

  if ( $request==='') {
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
}  /*1*/

 else {/*2*/
  echo 'null';
}/*2*/


}

else {
 echo 'null';
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

 $loja_id=$this->pega_loja();

$id=$this->session->userdata('userr_id');

$data=$this->data_atual();




$pega=$this->turno->lista_turno($data, $loja_id, $id);
//partepe poi na datatable costumiza e fxtmb

 foreach ($pega as $k) {

     $r= array();
     
       $r[]= '<span >'.$k->nome.'</span>';

       if ($k->funcao_=='Assistente' || $k->funcao_=='') {

      $r[]= '<span style="font-weight: bold; border-color: #070707; border: 1px;border-left: 0px; border-right: 0px; border-top: 0px; border-style: solid; margin-left:17px">A</span>';

       }

       else{

      $r[]= '<span style="font-weight: bold; border-color: #070707; border: 1px;border-left: 0px; border-right: 0px; border-top: 0px; border-style: solid; margin-left:17px">R</span>';
       }

       //$r[]= '<span >'.$k->funcao_.'</span>';

       $r[]= '<span >'.$k->zona.'</span>';
       $r[]= '<span >'.$k->data.'</span>';
       $r[]= '<span >'.$k->periodo.' °</span>';
       $r[]= '<span >'.$k->hora_entrada.'</span>';
       $r[]= '<span >'.$k->hora_saida.'</span>';

      
if ($id!=$k->id_funcionario && $k->funcao_=='Assistente') {

       $r[]='<a class="fa fa-pencil-square-o btn btn-group  text-warning " onclick="altera_r(\''.$k->id_turno.'\', \''.$k->nome.'\', \''.$k->hora_entrada.'\', \''.$k->hora_saida.'\')"></a> <a class="fa fa-user-times  btn btn-group text-danger" onclick="deleta_turno(\''.$k->id_turno.'\')"></a>';
      }
else{
       $r[]='<a class="fa fa-pencil-square-o btn btn-group  text-warning " onclick="altera_r(\''.$k->id_turno.'\', \''.$k->nome.'\', \''.$k->hora_entrada.'\', \''.$k->hora_saida.'\')"></a> <span  class="fa fa-user-times btn btn-group " style="color:#868080" ></span>';
}            

       
       $dados []=$r;
      
     }

 $output = array('data' => $dados); 
 echo json_encode($output);

}




public function lista_turno_detalhes() {

$pega=$this->turno->lista_turno_detalhes();
//partepe poi na datatable costumiza e fxtmb

 foreach ($pega as $k) {

     $r= array();
     
       $r[]= '<span >'.$k->nome.'</span>';

       if ($k->funcao_=='Assistente' || $k->funcao_=='') {

      $r[]= '<div class="col-md-6" style="background: #13CF25; border-radius: 5px; text-align: center; font-weight: bold;">A</div>';


       }

       else{

      $r[]= '<div class="col-md-6" style="background: #EE620D; border-radius: 5px; text-align: center; font-weight: bold;">R</div>';
       }

       //$r[]= '<span >'.$k->funcao_.'</span>';

       $r[]= '<span >'.$k->zona.'</span>';
       $r[]= '<span >'.$k->data.'</span>';
       $r[]= '<span >'.$k->periodo.' °</span>';
       $r[]= '<span >'.$k->hora_entrada.'</span>';
       $r[]= '<span >'.$k->hora_saida.'</span>';

      

       $r[]='<a class="fa fa-pencil-square-o  btn btn-group  text-primary " onclick="altera_r(\''.$k->id_turno.'\', \''.$k->nome.'\', \''.$k->hora_entrada.'\', \''.$k->hora_saida.'\')"></a> <a class="fa fa-user-times  btn btn-group text-primary" onclick="deleta_turno(\''.$k->id_turno.'\')"></a>';          

       
       $dados []=$r;
      
     }

 $output = array('data' => $dados); 
 echo json_encode($output);
/*echo json_encode($pega);*/
}

public function info_turno(){

$data['zona']=$this->input->post('zona');
$data['data']=$this->input->post('data');
$data['periodo']=$this->input->post('periodo');

$pacote = array('zona'=>$data['zona'], 'data'=>$data['data'], 'periodo'=>$data['periodo']);

$retorno=$this->turno->info_turno($pacote);

 foreach ($retorno as $k) {

  $r= array();

//particiona nome
$nome_p=explode(" ", $k->nome); 
   if (count($nome_p)>1) {
           $name=$nome_p[0].' '.$nome_p[1] ;
    }
           
  else {
           $name=$nome_p[0];
   }
   //fim de partitiona nome
 
 if ($k->funcao_=='Responsavel') {

  $r[]='<div class="col-md-4 "><div class="box " style="border-radius: 4px">'.
'<div class="box-header with-border" style="background: #EE620D">'.
'<span class="box-title" style="font-size: 12px">'.$name.' <strong>(R)</strong>'.'</span>'.
'<div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#'.$k->id_funcionario.'">'.
'<i class="fa fa-angle-double-down fa-lg hvr-hang"></i></button></div></div><div class="box-body collapse label-default" id="'.$k->id_funcionario.'" >'.
'<p><span><strong> Hora /E:</strong>'.$k->hora_entrada.'</span></p> <p><span><strong> Hora /S:</strong>'.$k->hora_saida.'</span></p> </div></div></div>';
 } 

 else {

  $r[]='<div class="col-md-4 "><div class="box " style="border-radius: 4px">'.
'<div class="box-header with-border" style="background: #13CF25">'.
'<span class="box-title" style="font-size: 12px">'.$name.' <strong>(A)</strong>'.'</span>'.
'<div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-toggle="collapse" data-target="#'.$k->id_funcionario.'">'.
'<i class="fa fa-angle-double-down fa-lg hvr-hang"></i></button></div></div><div class="box-body collapse label-default" id="'.$k->id_funcionario.'">'.
'<p><span><strong> Hora /E:</strong>'.$k->hora_entrada.'</span></p> <p><span><strong> Hora /S:</strong>'.$k->hora_saida.'</span></p>  </div></div></div>';
  
 }
 

  


       $dados []=$r;
      
     }

 $output = array('data' => $dados); 

 echo json_encode($output);

}

 public function pega_info_logado()  //pega id_user loagdo
{

 date_default_timezone_set('Atlantic/Cape_Verde'); 

$data=date('d/m/Y');
$time=date('H') ;
if ($time>=6 && $time<=14 ) { $periodo = 1 ; }
else{ $periodo = 2 ;  }

    $id=$this->session->userdata('userr_id');
    $nome=$this->session->userdata('_nome');
    $funcao=$this->session->userdata('_funcao');

 $formar_dados= array('id' => $id, 'nome' => $nome, 'funcao'=>$funcao);   
 $pega_user_log = array('data'=>$formar_dados);

if ($funcao=='adim') {
   $echo=false;
 }

 else{

 $retorno=$this->turno->funcionario_y_n_turno($data, $periodo, $id);

 if ($retorno==true) {
    $echo=false;
 } 
 else {
      $echo=true;
 }

     }

 $output = array(
  'resposta' => $echo, 
  'dados_user' => $pega_user_log
);
echo json_encode($output);    

}

/*  ==================lista de turno loja============*/
public function lista_turno_loja_(){

$r=$this->turno->lista_turno_loja_();
echo json_encode($r);

}

/*====================count turn======================*/
public function counta_all_lista_turno_loja_(){

$r_=$this->turno->counta_all_lista_turno_loja_();
echo $r_;

}


public function paginacao_(){  //aqui e para fazer pagicao

 $loja_id=$this->pega_loja();

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
  'id_loja_logado' =>$loja_id,
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


/*==================================================[Tudo haver com fecho e turno]================================================*/

 public function fecho_turno()
{  
 $loja_id=$this->pega_loja();
$id=$this->session->userdata('userr_id');
$data=$this->data_atual();

$respost=$this->turno->fecho_turno($id, $loja_id, $data);

echo json_encode($respost);

 }

 public function verifica_fecho_hora_turno()
{
$loja_id=$this->pega_loja();
$id=$this->session->userdata('userr_id');
$data=$this->data_atual();

$respo=$this->turno->verifica_fecho_hora_turno($id, $loja_id, $data);

echo $respo;

 }

  public function Relatorio()
{

$loja_id=$this->pega_loja();
$id=$this->session->userdata('userr_id');

$data['congelado']=$this->input->post('congelados');
$data['frescos_padaria']=$this->input->post('fresco');
$data['stock_armazem']=$this->input->post('stock');
$data['caixa_equipamentos']=$this->input->post('caixa');


$respo=$this->turno->Relatorio($id, $loja_id, $data);

  if ($respo==true) {
   echo true;
  }

  else
  {
    echo false;
  }


 }


}

/* End of file turno.php */
/* Location: ./application/controllers/turno.php */