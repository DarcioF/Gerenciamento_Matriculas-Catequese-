<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];

$descricao = $_POST['descricao'];
$idSacramento = $_POST['idSacramento'];
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

$sa -> alterar_Sacramento($conn, $sacramento->getDescricao(),$idSacramento);
}else {
				header("Location:form_up_sacramento.php?res22=error&id="."$idSacramento");
			}


?>