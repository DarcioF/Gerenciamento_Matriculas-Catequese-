<?php  
class Aluno{
	private $nome;
	private $matricula;
	private $local;
	private $email;
	private $telefone;
	private $idCatequista;
	private $idSacramento;

	
	public function setIdCatequista($idCatequista){
		if (is_string($idCatequista)) {
			$this -> idCatequista = $idCatequista;
		}
	}
	public function getIdCatequista(){
		return $this -> idCatequista;
	}


	public function setNome($nome){
		if (is_string($nome)) {
			$this -> nome = $nome;
		}
	}
	public function getNome(){
		return $this -> nome;
	}

	public function setMatricula($matricula){
		if (is_string($matricula)) {
			$this -> matricula = $matricula;
		}
	}
	public function getMatricula(){
		return $this -> matricula;
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
		if (is_string($idSacramento)) {
			$this -> idSacramento = $idSacramento;
		}
	}
	public function getIdSacremento(){
		return $this -> idSacramento;
	}
}
?>