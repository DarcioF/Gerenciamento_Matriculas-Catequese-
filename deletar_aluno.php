<?php 

$id=$_GET['id'];

echo $id;

require_once './model/conexao.php';
require_once './control/Aluno.php';
require_once './model/AlunoDAO.php';


$aluno = new Aluno();
$a = new AlunoDAO();

$a -> deletar_Aluno($conn,$id);


 ?>