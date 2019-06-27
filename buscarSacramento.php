<?php  

require_once './model/conexao.php';
require_once './model/SacramentoDAO.php';

$buscar = $_POST['palavra'];

$result = $conn -> query("SELECT * FROM sacramento WHERE descricao LIKE '%$buscar%'");

if ($result) { 
	    while($row = $result->fetch(PDO::FETCH_OBJ)){
         echo  '<td>'. $row -> descricao .'</td>
              <td> <a href="form_up_sacramento.php?id='.
               $row -> idSacramento.'"><i class=" far fa-edit"></i></a>'.'</td>
              <td><a value="id'.
               $row -> idSacramento.'"><a href="deletar_sacramento.php?id='.$row -> idSacramento.'"><button class="dropdown-item" onclick=" return confirm('."'Deseja deletar o registo?'".')"><i class="fa fa-times"></i></button></a></td>';
        echo '</tr>';
          
        }
      }
      else{
      	echo "Nenhum curso encontrado...";
      }



?>