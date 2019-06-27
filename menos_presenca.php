<?php
$mais=$_GET['menos'];
$id= $_GET['id'];


require_once './model/conexao.php';

 $result = $conn -> query("SELECT * FROM aluno WHERE idAluno='{$id}'");
 $row = $result->fetch(PDO::FETCH_OBJ);
 $presenca= $row-> presenca;
 $presenca= $presenca - $mais;
 if( $presenca > -1){
$result2 = $conn -> query("UPDATE aluno SET presenca='{$presenca}' WHERE idAluno='{$id}'");
}
header("Location:buscar_aluno.php?idCatequista=$row->idCatequista");
  ?>