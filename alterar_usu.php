<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];

$id = $_POST['id'];
$codLog = $_POST['codLog'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$senhaCon = $_POST['senhaCon'];

require_once './model/conexao.php';
require_once './control/Login.php';
require_once './model/LoginDAO.php';

$login = new Login();
$lo = new LoginDAO();
 echo $nome;
$result = $lo-> verificar_des($conn,$nome);
$count = $result->rowCount();

if($senha==$senhaCon){
if ($count==0) {
	$login -> setNome($nome); 
	$login -> setSenha($senha);

	echo $login->getNome();
	$lo -> alterar_login($conn, $login->getNome(),$login->getSenha(),$codLog,$id);

}else {
			header("Location:relatorio_usuario.php?res22=error");
			}

}else {
	header("Location:relatorio_usuario.php?res23=error");

}

?>