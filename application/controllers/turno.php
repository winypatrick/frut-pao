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

		
 $pega=$this->turno->lista_funcionario_diponivel();

/*//partepe poi na datatable costumiza e fxtmb
  foreach ($pega as $k) {

     $r= array();
       $r[]='<span >'.$k->nome.'</span>'.'<a  style="float:right; margin-right:20px"  ></a>';
       
       $r[]='<span >'.$k->funcao.'</span>';

       $r[]= '<a class="fa fa-share" onclick="pick_turno(\''.$k->id_user.'\', \''.$k->nome.'\')"></a>';

      
       $dados []=$r;
      
     }

 $output = array('data' => $dados); */
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

  $data['nome']=$this->input->post('nome_');
  $data['funcao']=$this->input->post('funcao_');
  $data['data']=$this->input->post('data_');
  $data['hora_entrada']=$this->input->post('hora_entrada_');
  $data['hora_saida']=$this->input->post('hora_saida_');
  $data['loja']=$this->input->post('loja_');
  $data['periodo']=$this->input->post('periodo_');
  $data['descricao_situacao']=$this->input->post('describb_');

  $array_verificar = array('loja'=>$data['loja'], 'data'=>$data['data'], 'periodo'=>$data['periodo'], 'funcao'=>'Responsavel');

  //print_r($array_verificar) ; listar array

if ($data['funcao']=='Assistente') {
  $catch_func=0;
}
else{
  $catch_func=1;
} 

$request=$this->turno->criar_turno($data, $array_verificar, $catch_func);

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

public function lista_turno() {

 $pega=$this->turno->lista_turno();
//partepe poi na datatable costumiza e fxtmb

 foreach ($pega as $k) {

     $r= array();
     
       $r[]= '<span >'.$k->nome.'</span>';

       if ($k->funcao=='Assistente') {

          $r[]= '<span style="font-weight: bold; border-color: #070707; border: 1px;border-left: 0px; border-right: 0px; border-top: 0px; border-style: solid; margin-left:17px">A</span>';

       }

       else{

          $r[]= '<span style="font-weight: bold; border-color: #070707; border: 1px;border-left: 0px; border-right: 0px; border-top: 0px; border-style: solid; margin-left:17px">R</span>';
       }

       //$r[]= '<span >'.$k->funcao.'</span>';

       $r[]= '<span >'.$k->loja.'</span>';
       $r[]= '<span >'.$k->data.'</span>';
       $r[]= '<span >'.$k->periodo.' °</span>';
       $r[]= '<span >'.$k->hora_entrada.'</span>';
       $r[]= '<span >'.$k->hora_saida.'</span>';
      
       
       $r[]='<a class="fa fa-pencil-square-o btn btn-group  text-warning" ></a> <a class="fa fa-user-times btn btn-group text-danger" onclick="deleta_turno(\''.$k->id_turno.'\')"></a>';
       
       $dados []=$r;
      
     }

 $output = array('data' => $dados); 
 echo json_encode($output);

}

 public function pega_id_user()  //pega id_user loagdo
{
    $id=$this->session->userdata('userr_id');

    echo $id;
}

}

/* End of file turno.php */
/* Location: ./application/controllers/turno.php */