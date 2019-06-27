<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];

$nome = $_POST['nome'];
$senha= $_POST['senha'];
$senhaC = $_POST['senhaCon'];


require_once './model/conexao.php';
require_once './control/Login.php';
require_once './model/LoginDAO.php';


$login = new Login();
$lo = new LoginDAO();
$result = $lo-> verificar_des($conn,$nome);
$count = $result->rowCount();
if($senha==$senhaC){
if ($count==0) {
	$login -> setNome($nome); 
	$login -> setSenha($senha);

	$lo -> inserir_login($conn, $login->getNome(),$login->getSenha(),1);

}else {
				header("Location:formUsu_cad.php?res22=error");
			}

}else {
	header("Location:FormUsu_cad.php?res23=error");

}
?>