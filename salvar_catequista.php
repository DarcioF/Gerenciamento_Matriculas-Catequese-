<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$local = $_POST['local'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$idSacramento = $_POST['idSacramento'];

require_once './model/conexao.php';
require_once './control/Catequista.php';
require_once './model/CatequistaDAO.php';

$catequista = new Catequista();
$cat = new CatequistaDAO();


$result = $cat-> verificar_cpf($conn,$cpf);
$count = $result->rowCount();

echo $count ;
if ($count==0){
$catequista-> setIdSacramento($idSacramento);
$catequista-> setNome($nome); 
$catequista-> setCpf($cpf); 
$catequista-> setLocal($local); 
$catequista-> setEmail($email); 
$catequista-> setTelefone($telefone); 


echo $nome;
echo $catequista->getIdSacramento();

$cat -> inserir_Catequista($conn, $catequista->getNome(),$catequista->getCpf(),$catequista->getLocal(),$catequista->getEmail(),$catequista->getTelefone(),$catequista->getIdSacramento());
}else {
	header("Location:catequista_cadastrar.php?res22=error");
}


?>