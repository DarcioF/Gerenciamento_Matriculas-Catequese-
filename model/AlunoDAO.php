<?php  
/**
 * Classe 
 */
class AlunoDAO
{
	public function inserir_Aluno($conn,$nome,$matricula,$local,$email,$telefone,$cat,$sacra){
				$result = $conn->exec("INSERT INTO aluno (nome,matricula,local,email,telefone,idCatequista,idSacramento, falta,presenca) VALUES ('{$nome}','{$matricula}','{$local}','{$email}','{$telefone}','{$cat}','{$sacra}',0,0)");
		if ($result) {
			header("Location:./alunos_cadastro.php?res=sucesso");
		}
	}

	public function alterar_Aluno($conn, $nome, $idAluno,$matricula,$local,$email,$telefone,$sacra,$cat){
		$result = $conn -> query("UPDATE aluno SET 
								nome = '{$nome}',matricula = '{$matricula}', local = '{$local}', email = '{$email}', telefone = '{$telefone}', idSacramento = '{$sacra}', idCatequista = '{$cat}'
								WHERE idAluno = '{$idAluno}'");
		if ($result) {
			header("Location:./relatorio_aluno.php?res=sucesso");
		}else{
			echo "Erro ao atualizar!";
		}	
	}

	public function listar_Aluno($conn){
		$result = $conn -> query("SELECT idAluno,nome,matricula,aluno.local,aluno.telefone,aluno.email,descricao,nomeC FROM aluno INNER JOIN sacramento ON aluno.idSacramento = sacramento.idSacramento INNER JOIN catequista ON aluno.idCatequista = catequista.idCatequista");
		return $result;
	}

	public function deletar_Aluno($conn, $idAluno){
		$result = $conn -> query("DELETE FROM aluno 
							WHERE idAluno = '{$idAluno
						}'");
		if($result){
			$msg = "Deletado com sucesso!";
			header("Location: relatorio_aluno.php?msg=$msg");
		}else{
			$msg_erro = "Erro ao deletar.";
			header("Location: relatorio_aluno.php?msg_erro=$msg_erro");
		}
	}

	public function verificar_mat($conn,$matricula){
		$result = $conn -> query("SELECT * FROM aluno WHERE matricula='{$matricula}'");
		return $result;
	}

public function listar_Chamada($conn,$id){
		$result = $conn -> query("SELECT * FROM  catequista,aluno WHERE catequista.idCatequista = '{$id}' and aluno.idCatequista='{$id}' ");
		return $result;
	}
	public function listar_Certificado($conn,$id){
		$result = $conn -> query("SELECT * FROM aluno,catequista,sacramento WHERE aluno.idAluno='{$id}' AND catequista.idCatequista=aluno.idCatequista and sacramento.idSacramento=aluno.idSacramento");
		return $result;
	}
	
}






?>