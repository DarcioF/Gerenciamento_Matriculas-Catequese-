<?php 

$id=$_GET['id'];

echo $id;

require_once './model/conexao.php';
require_once './control/Sacramento.php';
require_once './model/SacramentoDAO.php';


$sacramento = new Sacramento();
$sa = new SacramentoDAO();

$sa -> deletar_Sacramento($conn,$id);


 ?>