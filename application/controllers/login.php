<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

     function __construct(){
		parent::__construct();
		$this->load->model('model_login', 'op_log');

    $this->load->model('model_turno', 'turno');
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
                  'userr_id' => $id_user[0]->id_user,
                  '_nome' => $id_user[0]->nome,
                  '_email' => $id_user[0]->email,
                  '_funcao' => $id_user[0]->funcao));

  
      redirect('funcionario');

    }

    else{

      $this->session->set_flashdata('logado_no', true); 
     redirect('login/1');
    }



  }
}

public function pega_loja(){
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$id_loja=$this->turno->pega_loja($hostname);
return $id_loja;
}

public function logout()
  {
     $loja_id=$this->pega_loja();
     date_default_timezone_set('Atlantic/Cape_Verde'); 
    $id=$this->session->userdata('userr_id');
    $data=date('d/m/Y');

    $verifica=$this->turno->logout($id, $data, $loja_id);

    if ($verifica==true) {
      echo 'pendente';
    } 

   else {
    $this->session->sess_destroy();
    redirect('login');
    }
    
  }

/*public function merda(){

  echo "merda";
}
redirect('control/func');   isso e importante
*/


}


