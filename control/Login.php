<?php  
class Login{
	private $nome;
	private $senha;
	private $codLog;

	public function setNome($nome){
		$this -> nome = $nome;
				
	}
	public function getNome(){
		return $this -> nome;
	}
	public function setSenha($senha){
		if($senha==""){
					header("Location:./sacramento_cadastrar.php?res=error");
				}else {
					$this -> senha = $senha;
				
			}
	}
	public function getSenha(){
		return $this -> senha;
	}
	public function setCodLog($codLog){
		if($codLog==""){
					header("Location:./sacramento_cadastrar.php?res=error");
				}else {
					$this -> codLog = $codLog;
				
			}
	}
	public function getCod(){
		return $this -> codLog;
	}
}