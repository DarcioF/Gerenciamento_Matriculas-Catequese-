<?php

$id = $_GET["idSacramento"];
//$id = 2;

require_once './model/conexao.php';
require_once './model/CatequistaDAO.php';

$cat = new CatequistaDAO(); 
$result = $cat -> listar_Cat_id($conn, $id);

?>

<label>Catequista</label>
<select id="Catequista" name="idCatequista" class="form-control" required>
	<option value="">Selecione Uma Opção</option>
  <?php foreach($result as $key => $row){
    echo "<option value='{$row['idCatequista'] }'>{$row['nomeC']}</option>";
  }
?>
</select>