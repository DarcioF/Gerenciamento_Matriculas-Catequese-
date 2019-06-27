<?php
$id=$_GET['id'];

require_once './model/conexao.php';
require_once './model/AlunoDAO.php';
$data = date('d-m-Y');
$al= new AlunoDAO();
$result=$al-> listar_Certificado($conn,$id);
$html = '<h4 style="text-align: center;">----------------------------------------------------------------------------------------------------------------------------------------------------------------</h4>'; 

while($row = $result->fetch(PDO::FETCH_OBJ)){
		
		$html .= '<h3 style="text-align: center">Certificamos que '.$row -> nome .'<br> da matricula '.$row -> matricula. ' concluiu <br> o sacramento '.$row -> descricao .' realizado <br> na '.$row -> local.' no dia '.$data."</h3>";
        $html .= '<center><div><p><br>---------------------------------<br>Catequista: '.$row -> nomeC."</p><p><br>---------------------------------<br>Celebrante</p><div><center>";
		
                        }



use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;"><img style="align= left;border: 2px solid black" src="./img/sacramento.jpg" height="200" width="230">   <h2 style="text-align: center;" >Certificado</h2> </h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Certificados.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

 ?>