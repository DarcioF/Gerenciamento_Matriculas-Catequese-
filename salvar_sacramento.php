<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];

$descricao = $_POST['descricao'];

require_once './model/conexao.php';
require_once './control/Sacramento.php';
require_once './model/SacramentoDAO.php';

$descricao = strtoupper($descricao);
$sacramento = new Sacramento();
$sa = new SacramentoDAO();
$result = $sa-> verificar_des($conn,$descricao);
$count = $result->rowCount();
if ($count==0) {
	$sacramento -> setDescricao($descricao); 
$sa -> inserir_Sacramento($conn, $sacramento->getDescricao());

}else {
				header("Location:sacramento_cadastro.php?res22=error");
			}


?>