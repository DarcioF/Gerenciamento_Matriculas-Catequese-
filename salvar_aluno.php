<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$local = $_POST['local'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$idSacramento = $_POST['idSacramento'];
$idCatequista = $_POST['idCatequista'];



require_once './model/conexao.php';
require_once './control/Aluno.php';
require_once './model/AlunoDAO.php';

$al= new AlunoDAO();
$aluno = new Aluno();


$result = $al-> verificar_mat($conn,$matricula);
$count = $result->rowCount();

if($count==0){if($idSacramento=='Selecione Uma Opção'){
					header("Location:alunos_cadastro.php?res=error");
				} else if ( $idCatequista == 'Selecione Uma Opção') {
					header("Location:alunos_cadastro.php?res=error1");
				}
				else {
					
			
					
					$aluno-> setNome($nome); 
					$aluno-> setMatricula($matricula); 
					$aluno-> setLocal($local); 
					$aluno-> setEmail($email); 
					$aluno-> setTelefone($telefone); 
					$aluno-> setIdSacramento($idSacramento);
					$aluno-> setIdCatequista($idCatequista);
					echo $idSacramento;
					echo $aluno->getIdSacremento();
					$al->inserir_Aluno($conn, $aluno->getNome(),$aluno->getMatricula(),$aluno->getLocal(),$aluno->getEmail(),$aluno->getTelefone(),$aluno->getIdCatequista(),$aluno->getIdSacremento());
				}
			}
			else {
				header("Location:alunos_cadastro.php?res22=error");
			}
?>