<?php  
class Sacramento{
	private $descricao;

	public function setDescricao($descricao){
		if($descricao==""){
					header("Location:./sacramento_cadastrar.php?res=error");
				}else {
					$this -> descricao = $descricao;
				
			}
	}
	public function getDescricao(){
		return $this -> descricao;
	}
}
?>