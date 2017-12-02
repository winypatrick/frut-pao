<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_funcionario extends CI_Model {

function __construct(){
		parent::__construct();
}	

public function criar_funcioanrio($data, $email){



$this->db->select('*');
$this->db->where('email', $email);
$res=$this->db->get('funcionario_text')->result();

if ($res) {

 return false ;

}

else{

$resp=$this->db->insert('funcionario_text', $data);

if ($resp) {
    return true;
}

else{
    return false;
}

}


}

public function lista_funcionario($id_logado){

$this->db->select('*');
//$this->db->where('id_user!=', $id_logado);  isso nao precisa mas
$this->db->where('funcao!=', 'adim');
$res=$this->db->get('funcionario_text')->result();
return $res;
}


public function deletar_funcionario($id_user){

 $this->db->where('id_user', $id_user);
 return  $this->db->delete('funcionario_text');

}

public function altera_funcioanrio($data, $id_, $email_){


$this->db->select('*');
$this->db->where('email', $email_);
$this->db->where('id_user!=', $id_);
$res=$this->db->get('funcionario_text')->result();

if ($res) {

 return false ;

}

else{

$this->db->where('id_user', $id_);
$resp=$this->db->update('funcionario_text', $data);

if ($resp) {
    return true;
}

else{
    return false;
}

}

}

public function acesso_funcioario(){

    $id=$this->input->post('parm1');
    $senha=$this->input->post('parm2');

    $data['senha']=md5($senha);
    $this->db->where('id_user', $id);
    return $this->db->update('funcionario_text', $data);
   }

public function recupera_senha($email, $senha){

        $this->db->select('*');
        $this->db->where('email', $email);
        $recb = $this->db->get('funcionario_text')->result();
        
        if ($recb) {
            $data['senha']=md5($senha);
            $this->db->where('email', $email);
            $this->db->where('funcao!=', 'Assistente');
            $this->db->update('funcionario_text', $data);

            return $recb;
        }
        else {
            return false;
            
        }

}   
public function mudar_senha($id, $senha_a, $senha_n)
{
    $this->db->select('*');  
    $this->db->where('id_user', $id);
    $this->db->where('senha', md5($senha_a));
    $resp=$this->db->get('funcionario_text')->result();

    if ($resp) {
       $data['senha']=md5($senha_n);
       $this->db->where('id_user', $id);
       $this->db->update('funcionario_text', $data);
       return true;
    }

    else  {
       return false;
    }
}


 public function numero_funcionario()
{
     $this->db->select('COUNT(id_user) as n_funcionario'); 
     $resp= $this->db->get('funcionario_text')->result();
     return $resp;
}


}

/* End of file model_funcionario.php */
/* Location: ./application/models/model_funcionario.php */