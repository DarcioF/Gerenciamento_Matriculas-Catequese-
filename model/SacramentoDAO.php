<?php  
/**
 * Classe 
 */
class SacramentoDAO
{
	public function inserir_Sacramento($conn, $descricao){
		//exeuta uma série de instruções SQL
		$result = $conn->exec("INSERT INTO sacramento(descricao) VALUES ('{$descricao}')");
		if ($result) {
			header("Location:./sacramento_cadastro.php?res=sucesso");
		}else {
			header("Location:./sacramento_cadastro.php?res=erro");
		}
	}

	public function alterar_Sacramento($conn, $descricao, $idSacramento){
		$result = $conn -> query("UPDATE sacramento SET 
								descricao = '{$descricao}'
								WHERE idSacramento = '{$idSacramento}'");
		if ($result) {
			header("Location:relatorio_sacramento.php?res=sucesso");
		}else{
			header("Location:relatorio_sacramento.php?res=erro");
		}	
	}

	public function listar_Sacramento($conn){
		$result = $conn -> query("SELECT * FROM sacramento");
		return $result;
	}

	public function deletar_Sacramento($conn, $idSacramento){
	try{	$result = $conn -> query("DELETE FROM sacramento 
							WHERE idSacramento = '{$idSacramento}'");
 		if($result){
			$msg = "Deletado com sucesso!";
			header("Location: relatorio_sacramento.php?res1=sucesso1");
		}else{
			$msg_erro = "Erro ao deletar.";
			header("Location:relatorio_sacramento.php?msg_erro=$msg_erro");
		}
	}catch (PDOException $e) {
		
		header("Location:relatorio_sacramento.php?res1=error1");
	}


}
public function verificar_des($conn,$descricao){
		$result = $conn -> query("SELECT * FROM sacramento WHERE descricao='{$descricao}'");
		return $result;
	}
}

?>