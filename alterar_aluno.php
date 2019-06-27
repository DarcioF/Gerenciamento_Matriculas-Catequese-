<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];
$idAluno = $_POST['idAluno'];
$nome = $_POST['nome'];
$idCatequista= $_POST['idCatequista'];
$matricula = $_POST['matricula'];
$local = $_POST['local'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$idSacramento = $_POST['idSacramento'];
$idCatequista = $_POST['idCatequista'];
$mat=$_POST["mat"];

require_once './model/conexao.php';
require_once './control/Aluno.php';
require_once './model/AlunoDAO.php';
$al= new AlunoDAO();
$aluno = new Aluno();
$result = $al-> verificar_mat($conn,$matricula);


echo $mat;
$count = $result->rowCount();

	if($idSacramento=='Selecione Uma Opção'){
					header("Location:form_up_aluno.php?res=error");
				} else if ( $idCatequista == 'Selecione Uma Opção') {
					header("Location:form_up_aluno.php?res=error1");
				}
				else {
							
					$aluno-> setNome($nome); 
					$aluno-> setMatricula($matricula); 
					$aluno-> setLocal($local); 
					$aluno-> setEmail($email); 
					$aluno-> setTelefone($telefone); 
					$aluno-> setIdSacramento($idSacramento);
					$aluno-> setIdCatequista($idCatequista);
					
					if ($count==0 || $mat == $matricula) {
					$al->alterar_Aluno($conn, $aluno->getNome(),$idAluno,$aluno->getMatricula(),$aluno->getLocal(),$aluno->getEmail(),$aluno->getTelefone(),$aluno->getIdSacremento(),$aluno->getIdCatequista());
				}else {
				header("Location:form_up_aluno.php?res22=error&id="."$idAluno");
			}
				}



?>