<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller {

	
	public function index()
	{
		    if($this->session->userdata('logado_yes'))
        {
           $nome=$this->session->userdata('_nome');
           $email=$this->session->userdata('_email');

           /*particionar nome em parte*/
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
	public function loj()
	{
		if($this->session->userdata('logado_yes'))
    {

		$this->load->view('pages/corpo/corpo_loja');
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
