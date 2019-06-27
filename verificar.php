<?php
require_once './model/conexao.php';
$usuarioNome = $_POST['usuario'];
$usuarioSenha = $_POST['senha'];

$result = $conn -> query(" SELECT * FROM login
							WHERE 
							nome = '{$usuarioNome}' 
							AND 
							senha = '{$usuarioSenha}' ");
$count = $result->rowCount();

if($count==1){
	$row = $result->fetch();
	session_start();
	$_SESSION['nome'] = $row['nome'];
	$_SESSION['senha'] = $row['senha'];
	$_SESSION['codLog'] = $row['codLog'];
	if($row['codLog']==1){
		header("Location:index.php");
	}else {
		header("Location:admin.php");
	}
	
	echo "passou";
	}else{
		header("Location:login_erro.html");

	}


 ?>