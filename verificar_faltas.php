<?php

$id = $_GET["id"];


require_once './model/conexao.php';
require_once './model/AlunoDAO.php';

$result = $conn -> query("SELECT * FROM aluno WHERE idAluno='{$id}'");
	if ($result){
		$row = $result->fetch();
		
		$falta = $row["falta"];
	    $idCatequista= $row["idCatequista"];
		
	}

if($falta > 26){
	header("Location:buscar_aluno.php?res=error&idCatequista=". $idCatequista);
}else {
	header("Location:Certificados.php?id=".$id);
}

?>