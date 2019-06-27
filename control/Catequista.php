<?php  
class Catequista{
	private $nome;
	private $cpf;
	private $local;
	private $email;
	private $telefone;
	private $idSacramento='Selecione Uma Opção';
		
	
	public function setNome($nome){
		if (is_string($nome)) {
			$this -> nome = $nome;
		}
	}
	public function getNome(){
		return $this -> nome;
	}

	public function setCpf($cpf){
		if (is_string($cpf)) {
			$this -> cpf = $cpf;
		}
	}
	public function getCpf(){
		return $this -> cpf;
	}

	public function setLocal($local){
		if (is_string($local)) {
			$this -> local = $local;
		}
	}
	public function getLocal(){
		return $this -> local;
	}
	public function setEmail($email){
		if (is_string($email)) {
			$this -> email = $email;
		}
	}
	public function getEmail(){
		return $this -> email;
	}
	public function setTelefone($telefone){
		if (is_string($telefone)) {
			$this -> telefone = $telefone;
		}
	}
	public function getTelefone(){
		return $this -> telefone;
	}

	public function setIdSacramento($idSacramento){
			if($idSacramento=='Selecione Uma Opção'){
					header("Location:./catequista_cadastrar.php?res=error");
				}else {
					$this -> idSacramento = $idSacramento;
				
			}	
		
	}
	public function getIdSacramento(){
		return $this -> idSacramento;
	}

}
?>