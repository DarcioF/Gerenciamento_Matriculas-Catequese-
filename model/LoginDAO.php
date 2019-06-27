<?php  
/**
 * Classe 
 */
class LoginDAO
{
	public function inserir_login($conn, $nome,$senha,$codlog){
		//exeuta uma série de instruções SQL
		$result = $conn->exec("INSERT INTO login(nome,senha,codLog) VALUES ('{$nome}','{$senha}','{$codlog}')");
		if ($result) {
			header("Location:./formUsu_cad.php?res=sucesso");
		}else {
			header("Location:./formUsu_cad.php?res=erro");
		}
	}

	public function alterar_login($conn,$nome,$senha,$codlog,$idUsu){
		$result = $conn -> query("UPDATE login SET 
								nome = '{$nome}', senha = '{$senha}', codLog = '{$codlog}'
								WHERE idUsu = '{$idUsu}'");
		if ($result) {
			header("Location:relatorio_usuario.php?res22=sucesso22");
		}else{
			header("Location:relatorio_usuario.php?res22=erro22");
		}	
	}

	public function listar_login($conn){
		$result = $conn -> query("SELECT * FROM login WHERE codLog=1");
		return $result;
	}

	public function deletar_login($conn, $idUsu){
	try{	$result = $conn -> query("DELETE FROM login 
							WHERE idUsu = '{$idUsu}'");
 		if($result){
			$msg = "Deletado com sucesso!";
			header("Location: relatorio_usuario.php?res1=sucesso1");
		}else{
			$msg_erro = "Erro ao deletar.";
			header("Location:relatorio_usuario.php?msg_erro=$msg_erro");
		}
	}catch (PDOException $e) {
		
		header("Location:relatorio_sacramento.php?res1=error1");
	}


}
public function verificar_des($conn,$nome){
		$result = $conn -> query("SELECT * FROM login WHERE nome='{$nome}'");
		return $result;
	}
}

?>