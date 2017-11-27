<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

     function __construct(){
		parent::__construct();
		$this->load->model('model_login', 'op_log');
}
	public function index($indice=null)
	{

    /* se sessao sta aberto e ta bai direto pa acesso*/
     if($this->session->userdata('logado_yes'))
        {
           $pegado=$this->session->userdata('userr_id');
          redirect('funcionario');
        }


    else{
       $date['msg']="";

     if($indice==1){
         $date['msg']="atencao verifica Email ou senha esta incorreto ";
        }

    $this->load->view('pages/login', $date);
    }




	}


public function acesso(){

   $this->form_validation->set_rules('email', 'email', 'required');  //define regras
   $this->form_validation->set_rules('password', 'password', 'required'); //define regras

  if ($this->form_validation->run() ==true) {


 $user=$this->input->post('email');
  $pass=$this->input->post('password');

 $id_user= $this->op_log->acesso($user, $pass);

 $nome['perfil']=$id_user;

    if ($id_user) {

      $this->session->set_userdata(array(
                  'logado_yes' => true,
                  'id' => $id_user[0]->id_user,
                  'nome' => $id_user[0]->nome,
                  'email' => $id_user[0]->email,
                  //'funcao' => $id_user[0]->funcao)
                );

      /*$pegado=$this->session->userdata('userr_nome');
      echo $pegado;*/

      redirect('funcionario');

      /*teste
      echo $id_user[0]->id_user;
      echo $id_user[0]->nome;*/
    }

    else{

      $this->session->set_flashdata('logado_no', true);

      //$this->load->view('pages/login');
     redirect('login/1');
     // echo 'merda';
    }

    //echo $user;

  }
}


//sair de
public function logout()
  {

    $this->session->sess_destroy();
    redirect('login');

  }

/*public function merda(){

  echo "merda";
}
redirect('control/func');   isso e importante
*/


}
