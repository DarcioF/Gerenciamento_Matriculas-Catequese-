<?php 

$id=$_GET['id'];

echo $id;

require_once './model/conexao.php';
require_once './control/Catequista.php';
require_once './model/CatequistaDAO.php';


$sacramento = new Catequista();
$sa = new CatequistaDAO();

$sa -> deletar_Cateqista($conn,$id);


 ?>