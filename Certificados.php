<?php
$id=$_GET['id'];

require_once './model/conexao.php';
require_once './model/AlunoDAO.php';
$data = date('d-m-Y');
$al= new AlunoDAO();
$result=$al-> listar_Certificado($conn,$id);
$html = '<!DOCTYPE html>';
$html .='<html>';
$html .='<head>';
$html .='<title></title>';
$html .='</head>';
$html .='<body bgcolor="#87CEEB">';

$html .='<div><div><img style="align= right ;border: 2px solid #87CEFA; margin-right: 240px ; margin-top: 0px; float: left" src="./img/novo2.png" height="200" width="230"><img style="align= right ;border: 2px solid #87CEFA; margin-left: 18px ; margin-top: 0px;" src="./img/novo.png" height="200" width="230"></div></div> ';
$html .='<center><h1>Certificado</h1></center>';

while($row = $result->fetch(PDO::FETCH_OBJ)){
	
		$html .= '<br><hr><h3  style="text-align: center;">Certificamos que '.$row -> nome .'<br> da matricula '.$row -> matricula. ' concluiu <br> o sacramento '.$row -> descricao .' realizado <br> na '.$row -> local.' no dia '.$data."</h3>";
        $html .= '<div><center><div><p><br>---------------------------------<br><b>Catequista: '.$row -> nomeC."<b></p></div><div><p><br>---------------------------------<br><b>Celebrante<b></p></div><center></div>";
		
                        }
$html .= '<img style="align= right ;border: 2px solid #87CEFA; margin-right: 240px ; margin-top: 265px;" src="./img/borda.png" height="75" width="722">';                      
$html .= '</body>';
$html .= '</html>';


use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html($html);

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