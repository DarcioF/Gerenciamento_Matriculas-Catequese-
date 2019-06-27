<?php 

$id=$_GET['id'];
$nomeC=$_GET['nomeC'];
$descricao=$_GET['descricao'];
$local=$_GET['local'];

require_once './model/conexao.php';
require_once './model/AlunoDAO.php';
$data = date('d-m-Y');
$al= new AlunoDAO();
$result=$al->listar_Chamada($conn,$id);
$html = '<h4>Catequista: '.$nomeC.'<br>Sacramento: '.$descricao.' <br>Local: '.$local.'<br>Data: '.$data.'</h4>'; 
$html .= '<table border=1';	
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Matricula</th>';
$html .= '<th>Nome</th>';
$html .= '<th width="300">Presença</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';




while($row = $result->fetch(PDO::FETCH_OBJ)){
        $html .= '<tr><td width="60">'.$row -> matricula . "</td>";
		$html .= '<td width="170">'.$row -> nome . "</td>";     
        $html .= '<td width="10"></td></tr>"';
                        }
	$html .= '</tbody>';
$html .= '</table';

use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Lista de Chamada</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Lista_de_chamada.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

 ?>