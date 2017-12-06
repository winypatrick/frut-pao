<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller {
	public function __construct()
  {
          parent::__construct();
          $this->load->model('model_loja', 'loja');

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

public function criar_loja()
{
	$dados['zona'] = $this->input->post('zona');
	$dados['contacto'] = $this->input->post('contacto');
	$dados['data_inaugoracao'] = $this->input->post('data_inaugoracao');
	$dados['data_Encerramento'] = $this->input->post('data_encerramento');
	$dados['rua'] = $this->input->post('rua');
	$dados['estado'] = $this->input->post('estado');
	$contacto = $dados['contacto'];

	// $arraydados = array('zona' => $dados['zona'], 'rua' => $dados['rua'], 'data_inaugoracao' => $dados['data_inaugoracao'],
	//  'contacto' => $dados['contacto'], 'estado' => $dados['estado']);

	$rst = $this->loja->insert_loja($dados,$contacto);

// echo json_encode($arraydados);

	 if ($rst) {
	 	echo true;
	}else {
		echo false;
	}
}

public function listar_loja()
{
	$a = 'loja_info';
	$rst = $this->loja->list_loja();

	foreach ($rst as $key) {
		$dados = array();

		// if ($key->estado != 0) {//0 - fechado(no futoro && enable ==true)
			$dados[] = '<span>'.$key->zona.'</span>';
			$dados[] = '<span>'.$key->rua.'</span>';
			$dados[] = '<span>'.$key->contacto.'</span>';
			$dados[] = '<button type="button" class="btn btn-default" onclick="analisar()">Analise</button>';
			$dados[] = '<button type="button" class="btn btn-default" onclick="ir_para(\''.$a.'\',\''.$key->id_lojja.'\')">Detalhes</button>';
		// }
		$arraydados[] = $dados;
	}
	$output = array('data' => $arraydados);
	echo json_encode($output);
}

public function listas_loja_dados()
{
	$rst = $this->input->post('id_loja');
	$dados = $this->loja->list_loja_id($rst);

	echo json_encode($dados);
}

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

	public function loja_info(){
		if($this->session->userdata('logado_yes'))
        {
		$this->load->view('pages/corpo/corpo_loja_info');
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
