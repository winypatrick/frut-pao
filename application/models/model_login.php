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
// $this->db->where('funcao!=', 'Assistente');
$result = $this->db->get('funcionario')->result();

$this->db->select('*');
$this->db->where()


if($result!=''){
      return $result;
}

else {

	return false;
}

}


}
