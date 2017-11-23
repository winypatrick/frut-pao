<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		    if($this->session->userdata('logado_yes'))
        {  
           $nome=$this->session->userdata('_nome');
           $email=$this->session->userdata('_email'); 
           
           /*particionar nomeem parte*/
           $nome_p=explode(" ", $nome);

           $pacote['perfil_nome']=$nome_p[0] ; 
           $pacote['perfil_nome_menu']=$nome_p[0].' '.$nome_p[1] ;
           $pacote['perfil_email']=$email ; 

		$this->load->view('pages/header', $pacote);
		$this->load->view('pages/menu', $pacote);
		$this->load->view('pages/corpo/corpo_loja');
		$this->load->view('pages/footer');
	}
  
   else{
  
         redirect('login');             
      }
		
	}



//chamar so corpo
  /* public function login()
	{
		$this->load->view('pages/login');
	}*/




/*essa parte pra ir_para()*/
	public function loj()
	{
		    if($this->session->userdata('logado_yes'))
        {  

		$this->load->view('pages/corpo/corpo_loja');

		//echo true;
	}
  
   else{
  
         //redirect('login');   
         echo false;          
      }
		
	}

	public function turno()
	{
	if($this->session->userdata('logado_yes'))
        {  

		$this->load->view('pages/corpo/corpo_turno');

		//echo true;
	}
  
   else{
  
        // redirect('login'); 
        echo false;              
      }
		
	}

	public function funcionario()
	{
	if($this->session->userdata('logado_yes'))
        {  

		$this->load->view('pages/corpo/corpo_funcionario');
		//echo true;
	}
  
   else{
  
         //redirect('login'); lado de jquery ta fica mas dreto
         echo false;               
      }
		
	}



//pegado nome do pc que foi logado
public function nome_comp(){
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo $hostname;
}


}