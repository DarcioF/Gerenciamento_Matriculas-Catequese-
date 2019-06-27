<?php 

$id=$_GET['id'];

echo $id;

require_once './model/conexao.php';
require_once './model/LoginDAO.php';


$sa = new loginDAO();

$sa -> deletar_login($conn,$id);


 ?>