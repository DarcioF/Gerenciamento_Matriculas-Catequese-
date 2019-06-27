<?php

//$categoria = array();
//$categoria['nome'] = $_POST['nome'];

$nome = $_POST['nome'];
$idCatequista= $_POST['idCatequista'];
$cpf = $_POST['cpf'];
$local = $_POST['local'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$idSacramento = $_POST['idSacramento'];
$cpfVerif= $_POST['cpfVerif'];

require_once './model/conexao.php';
require_once './control/Catequista.php';
require_once './model/CatequistaDAO.php';
$catequista = new Catequista();
$cat = new CatequistaDAO();
$result = $cat-> verificar_cpf($conn,$cpf);
$count = $result->rowCount();

if($idSacramento=='Selecione Uma Opção...'){
					header("Location:./form_up_catequista.php?res=error&id=".$idCatequista);
				}else {
					
					$catequista-> setIdSacramento($idSacramento);
					$catequista-> setNome($nome); 
					$catequista-> setCpf($cpf); 
					$catequista-> setLocal($local); 
					$catequista-> setEmail($email); 
					$catequista-> setTelefone($telefone); 



					echo $catequista->getIdSacramento();
					if ($count==0 || $cpfVerif== $cpf) {
					$cat -> alterar_Catequista($conn, $catequista->getNome(),$idCatequista,$catequista->getCpf(),$catequista->					getLocal(),$catequista->getEmail(),$catequista->getTelefone(),$catequista->getIdSacramento());
				}else {
					header("Location:form_up_catequista.php?res22=error&id=$idCatequista&idSacramento=$idSacramento");
}

			}	



?>