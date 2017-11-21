<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

  public function __construct()
  {
          parent::__construct();
          $this->load->model('model_funcionario', 'funcionario');

  }

 public function index()
 {
           if($this->session->userdata('logado_yes'))
           {
           $nome=$this->session->userdata('_nome');
           $email=$this->session->userdata('_email');

           /*particionar nomeem parte*/
           $nome_p=explode(" ", $nome);

           $pacote['perfil_nome']=$nome_p[0] ;

           //contar lemento campo nome para nao dar erro no arrya funcao count
           if (count($nome_p)>1) {
           $pacote['perfil_nome_menu']=$nome_p[0].' '.$nome_p[1] ;
           }

           else {
           $pacote['perfil_nome_menu']=$nome_p[0];
           }

           $pacote['perfil_email']=$email ;

           $this->load->view('pages/header', $pacote);
           $this->load->view('pages/menu', $pacote);
           $this->load->view('pages/corpo/corpo_principal');
           $this->load->view('pages/footer');

           }

           else{

           redirect('login');
           }



}

 /*  public function login() sprimenta
	{
		//$this->load->view('pages/login');
   // redirect('login');
    $pegado=$this->session->userdata('userr_id');
    echo $pegado;
	}*/


//operacoes de funcionario

   public function criar_funcioanrio(){

   $data['nome']=$this->input->post('nome');
   $data['data_nascimento']=$this->input->post('datetimepicker1');
   $data['sexo']=$this->input->post('selecao');
   $data['morada']=$this->input->post('morada');
   $data['n_bi']=$this->input->post('bi_');
   $data['n_nif']=$this->input->post('nif');
   $data['email']=$this->input->post('email');
   $data['contacto']=$this->input->post('number');
   $data['data_entrada']=$this->input->post('datetimepicker2');
   $data['data_saida']=$this->input->post('datetimepicker3');
   $data['funcao']=$this->input->post('funcao');
   $data['descricao']=$this->input->post('des');
   $_email=$data['email'];

 $array_dados=array('nome'=>$data['nome'], 'data_nascimento'=>$data['data_nascimento'], 'sexo'=>$data['sexo'], 'n_bi'=>$data['n_bi'], 'morada'=>$data['morada'], 'n_nif'=>$data['n_nif'], 'data_entrada'=>$data['data_entrada'], 'data_saida'=>$data['data_saida'], 'funcao'=>$data['funcao'], 'descricao'=>$data['descricao'], 'email'=>$data['email'], 'contacto'=>$data['contacto']);

    $resp=$this->funcionario->criar_funcioanrio($array_dados, $_email);


  if ($resp==true) {
   echo true;
  }
  else
   {
  	echo false;
  }

   }

public function lista_funcionario(){
 $funcao_pego=$this->session->userdata('_funcao');
 $id_logados=$this->session->userdata('userr_id');

 $pega=$this->funcionario->lista_funcionario($id_logados);

//partepe poi na datatable costumiza e fxtmb
 foreach ($pega as $k) {

     $r= array();

       if ($id_logados==$k->id_user) {
         $r[]='<span style="background: #0FEBC9; font-size: 18px; font-weight: bold;">&nbsp;</span><span >'.$k->nome.'</span>'.'<a  style="float:right; margin-right:10px" class="fa fa-info-circle btn" onclick="set_funcionario(\''.$k->id_user.'\', \''.$k->n_bi.'\', \''.$k->n_nif.'\', \''.$k->data_nascimento.'\',  \''.$k->sexo.'\', \''.$k->data_entrada.'\', \''.$k->data_saida.'\', \''.$k->descricao.'\')" ></a>';
        }

        else{

           $r[]='&nbsp;<span >'.$k->nome.'</span>'.'<a  style="float:right; margin-right:10px" class="fa fa-info-circle btn" onclick="set_funcionario(\''.$k->id_user.'\', \''.$k->n_bi.'\', \''.$k->n_nif.'\', \''.$k->data_nascimento.'\',  \''.$k->sexo.'\', \''.$k->data_entrada.'\', \''.$k->data_saida.'\', \''.$k->descricao.'\')" ></a>';

        }





       $r[]='<span >'.$k->morada.'</span>';

       $r[]= '<span >'.$k->funcao.'</span>';

       $r[]= '<span >'.$k->email.'</span>';

       $r[]= '<span > <i class="fa fa-phone"></i>'.$k->contacto.'</span>';

       if ($funcao_pego=='adim') {

       $func= $k->funcao;

       if ($func=="Responsavel" ) {

       if ($k->senha!='' || $k->senha!=null) {
        $r[]= '<a style="color: #2BAF0C; margin-top: 8px; margin-left:10px" class="fa fa-cog" ></span>';

       }

       else
        $r[]= '<a class="fa fa-cog" style="margin-top: 8px; margin-left:10px" onclick="set_acesso(\''.$k->id_user.'\', \''.$k->email.'\')" ></a>';

       }

       if($func=="Assistente"){
         $r[]= '<a style="color: #DB1919; margin-top: 8px; margin-left:10px" class="fa fa-cog" ></a>';
       }


      $r[]='<a  data-toggle="modal" data-target="#myModal"  class="fa fa-pencil-square-o btn btn-group hvr-bounce-in" onclick="set_info_funcionario(\''.$k->id_user.'\', \''.$k->nome.'\', \''.$k->data_nascimento.'\', \''.$k->sexo.'\', \''.$k->morada.'\', \''.$k->n_bi.'\', \''.$k->n_nif.'\', \''.$k->email.'\', \''.$k->contacto.'\', \''.$k->data_entrada.'\', \''.$k->data_saida.'\', \''.$k->funcao.'\', \''.$k->descricao.'\' )" ></a><a  class="glyphicon glyphicon glyphicon-remove btn btn-group hvr-bounce-in"  onclick="deleta_funcionario(\''.$k->id_user.'\')"></a>';

        }


        else{

        $r[]= '<span style="color: #0C0707; margin-top: 8px; margin-left:10px" class="fa fa-eye-slash" ></span>';


        $r[]='';


        }

       $dados []=$r;

     }

 $output = array('data' => $dados);
 echo json_encode($output);
}

public function deletar_funcionario(){

 $pega=$this->funcionario->deletar_funcionario();

 if ($pega) {
   echo true;
 }

}

public function altera_funcioanrio(){

   $id_func=$this->input->post('id_funcionario');

   $data['nome']=$this->input->post('nome');
   $data['data_nascimento']=$this->input->post('datetimepicker1');
   $data['sexo']=$this->input->post('selecao');
   $data['morada']=$this->input->post('morada');
   $data['n_bi']=$this->input->post('bi_');
   $data['n_nif']=$this->input->post('nif');
   $data['email']=$this->input->post('email');
   $data['contacto']=$this->input->post('number');
   $data['data_entrada']=$this->input->post('datetimepicker2');
   $data['data_saida']=$this->input->post('datetimepicker3');
   $data['funcao']=$this->input->post('funcao');
   $data['descricao']=$this->input->post('des');
   $_email_=$data['email'];

 $array_dados=array('nome'=>$data['nome'], 'data_nascimento'=>$data['data_nascimento'], 'sexo'=>$data['sexo'], 'n_bi'=>$data['n_bi'], 'morada'=>$data['morada'], 'n_nif'=>$data['n_nif'], 'data_entrada'=>$data['data_entrada'], 'data_saida'=>$data['data_saida'], 'funcao'=>$data['funcao'], 'descricao'=>$data['descricao'], 'email'=>$data['email'], 'contacto'=>$data['contacto']);

  $resp=$this->funcionario->altera_funcioanrio($array_dados, $id_func,  $_email_);


  if ($resp==true) {
   echo true;
  }
  else
   {
    echo false;
  }

}

public function acesso_funcioario(){

$resp=$this->funcionario->acesso_funcioario();

 if ($resp==true) {
    echo true;
}

  else
{
    echo false;
}
   }

public function recupera_senha(){

$email_= $this->input->post("parm1");
$novo_senha= $this->input->post("parm2");


$pega=$this->funcionario->recupera_senha($email_, $novo_senha);
  if($pega!=false)
  {
    foreach ($pega as $k) {
      $pega_email= $k->email;
      $pega_senha= $novo_senha;
      $pega_user= $k->senha;
    }//
      $configGmail = array(
        'protocol'=>'smtp',
        'smtp_host'=>'ssl://smtp.gmail.com',
        'smtp_port'=>'465',
        'smtp_user'=>'winypatrick@gmail.com',
        'smtp_pass'=>'26444010anonymous',
       // 'mailtype'  => 'text',
        'mailtype'  => 'html',
        'charset' => 'utf-8',
      );

      $this->load->library('email', $configGmail);
      $this->email->set_newline("\r\n");
      $this->email->from('winypatrick@gmail.com', 'winy');
      $this->email->to($pega_email);
      $this->email->subject('Recuperação de Conta FrutPao');

      $html= '<div style=" min-height: 50px; overflow: auto; border-radius: 10px">
                <div>
                  <span style="padding:15px 0 15px 20px; color:#fff; background-color: #33A50B; border-radius: 10px; text-align: center; font-weight: bold; font-size:20px; font-family: Helvetica,Arial,sans-serif;margin:0;float:left">
                    <span> <strong>Frut&Pao<strong> &nbsp;&nbsp;</span>
                  </span>
                </div>
              </div>

              <div style="border-width: 1px; border-style: solid; border-color: #33A50B; padding: 0px 20px 0px 20px; font-size: 18px; font-family: Helvetica,Arial,sans-serif; text-align: center">
                <h3>Recuperação de Conta</h3>
                <p>Foi enviado a recuperação de uma conta associada a este email.</p>
                <p>Para questao de segurança foi gerada uma nova Senha para sua a conta Frut&Pao: </p>
                <p><strong>Email: <span style="color: #3c8dbc" >'.$pega_email.' </span></strong></p>
                <p><strong>Senha: <span style="color: #3c8dbc">'.$pega_senha.'</span></strong></p>

                <br>
                  <br><br>
                <div class="col-md-4" style="padding-bottom: 30px">
                  <span style="background-color:#EB5C2A; color: #FFF; border-color: #122b40; padding: 6px 12px;margin-bottom: 0;font-size: 18px;font-weight: 600;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle; float: right;">
                  <a href="http://localhost/frut&pao/login" style="text-decoration: none; color: #ffffff; ">Click ir para
                  </a>
                  </span>
                </div>
              </div>';

      $this->email->message($html);

      if( $this->email->send()){
        echo true;
      }
      else{
        echo false;
      }
    } //Fim do foreach
  //}

  else{
    echo false;
  }

}

public function mudar_senha()
{
  $id_logados=$this->session->userdata('userr_id');
  $senha_a= $this->input->post("parm1");
  $senha_n= $this->input->post("parm2");

$resposta=$this->funcionario->mudar_senha($id_logados, $senha_a, $senha_n);

if ($resposta==true) {
  echo true;
}

else {
  echo false;
}

}

 public function pega_funcao()
{
    $pega_funcao=$this->session->userdata('_funcao');

    echo $pega_funcao;
}

 public function numero_funcionario()
{
     $resposta=$this->funcionario->numero_funcionario();
     echo json_encode($resposta);
}


}
