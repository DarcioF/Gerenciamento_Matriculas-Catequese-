<?php  
/**
 * Classe 
 */
class CatequistaDAO
{
	public function inserir_Catequista($conn, $nome,$cpf,$local,$email,$telefone,$idSacra){
		if($idSacra!='Selecione Uma Opção'){
				$result = $conn->exec("INSERT INTO catequista (nomeC,cpf,local,email,telefone,idSacramento) VALUES ('{$nome}','{$cpf}','{$local}','{$email}','{$telefone}','{$idSacra}')");
		if ($result) {
			header("Location:./catequista_cadastrar.php?res=sucesso");
		}
		}else{
			header("Location:./catequista_cadastrar.php?res=error");
		}
	}

	public function alterar_Catequista($conn, $nome, $idCatequista,$cpf,$local,$email,$telefone,$idSacra){
		$result = $conn -> query("UPDATE catequista SET 
								nomeC = '{$nome}', cpf = '{$cpf}', local = '{$local}', email = '{$email}', telefone = '{$telefone}', idSacramento = '{$idSacra}'
								WHERE idCatequista = '{$idCatequista}'");
		if ($result) {
			header("Location:./relatorio_catequista.php?res=sucesso");
		}else{
			header("Location:./relatorio_catequista.php?res=error&id=$idCatequista&idSacramento=$idSacramento");
		}	
	}

	public function listar_Catequista($conn){
		$result = $conn -> query("SELECT * FROM catequista INNER JOIN sacramento ON catequista.idSacramento = sacramento.idSacramento");
		return $result;
	}

	public function deletar_Cateqista($conn, $idCatequista){
	try{	$result = $conn -> query("DELETE FROM catequista 
							WHERE idCatequista = '{$idCatequista
						}'");
		if($result){
			$msg = "Deletado com sucesso!";
			header("Location: relatorio_catequista.php?res1=sucesso1");
		}else{
			$msg_erro = "Erro ao deletar.";
			header("Location: relatorio_catequista.php?msg_erro=$msg_erro");
		}
	} catch (PDOException $e) {
		header("Location:relatorio_catequista.php?res1=error1");
	}
}

public function listar_Cat_id($conn, $id){
		//executa uma instrução SQL de consulta
		$result = $conn -> query("SELECT * FROM catequista 
									WHERE idSacramento='{$id}' ");
		return $result;

	}
	public function verificar_cpf($conn,$cpf){
		$result = $conn -> query("SELECT * FROM catequista WHERE cpf='{$cpf}'");
		return $result;
	}
}

?>