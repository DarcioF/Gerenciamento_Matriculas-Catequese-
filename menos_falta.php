<?php
$mais=$_GET['menos'];
$id= $_GET['id'];


require_once './model/conexao.php';

 $result = $conn -> query("SELECT * FROM aluno WHERE idAluno='{$id}'");
 $row = $result->fetch(PDO::FETCH_OBJ);
 $faltas= $row-> falta;
 $faltas= $faltas - $mais;
 if ($faltas > -1) {
 	$result2 = $conn -> query("UPDATE aluno SET falta='{$faltas}' WHERE idAluno='{$id}'");
 }

 header("Location:buscar_aluno.php?idCatequista=$row->idCatequista");
  ?>