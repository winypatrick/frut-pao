<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	function __construct(){
			parent::__construct();
	}	
		
public function acesso($user, $pass){

$senha=md5($pass);
$this->db->select('*');
$this->db->where('email', $user);
$this->db->where('senha', $senha);
$this->db->where('funcao!=', 'Assistente');
$result = $this->db->get('funcionario_text')->result();

/*$id_ = $result[0]->id_user;
$nome_=$result[0]->nome;
*/
//$nom= $result[0]->nome;


if($result!=''){
      return $result;     
}

else {

	return false;
}

}


}