<?php

$id = $_GET["idCatequista"];


require_once './model/conexao.php';
require_once './model/AlunoDAO.php';

$cat = new AlunoDAO(); 
$result = $cat -> listar_Chamada($conn, $id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gerenciamento Catequese</title>
    <link rel="shortcut icon" type="image/x-png" href="./img/logo.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script>
    function buscar_Aluno(){
      var idCatequista = $('#idCatequista').val();
      if(idCatequista){
        var url = 'buscar_aluno.php?idCatequista='+idCatequista;
        $.get(url, function(dataReturn) {
          $('#Table').html(dataReturn);
        });
      }
    }
    </script>

    

</head>

<body id="page-top">
<?php 
// Inicia sessões 
session_start(); 
 
// Verifica se existe os dados da sessão de login 
if(isset($_SESSION['nome']) && isset($_SESSION['senha']) && $_SESSION['codLog']==1) 
{ ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!--Imagem na tela-->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
           <i class="fas fa-church"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CatG</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!--Pagina Inicial -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fa fa-home"></i>
          <span>Pagina Inicial</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Cadastro-->
      <div class="sidebar-heading">
        Gerenciamento
      </div>

      <!-- Itens no Cadastros -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-plus-square"></i>
          <span>Cadastros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="alunos_cadastro.php">Alunos</a>
            <a class="collapse-item" href="catequista_cadastrar.php">Catequista</a>
            <a class="collapse-item" href="sacramento_cadastro.php">Sacramento</a>
          </div>
        </div>
      </li>

      <!-- Relatorios -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-table"></i>
          <span>Relatórios</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="relatorio_aluno.php">Alunos</a>
            <a class="collapse-item" href="relatorio_catequista.php">Catequistas</a>
            <a class="collapse-item" href="relatorio_sacramento.php">Sacramento</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
       <a class="nav-link" href="controle_aluno.php">
           <i class="far fa-id-card"></i>
          <span>Controle de Alunos</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
              <script>
                  function funcao1(){
                  var x;
                  var r=confirm("Tem Certeza que deseja sair?");
                      if (r==true){
                        location.href="sair.php";
                     }
                  }
              </script>
            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nome']; ?></span>
                 <img class="img-profile rounded-circle" src="./img/login.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <button class="dropdown-item" onclick="funcao1()"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair</button>
              </div>
            </li>

          </ul>

    
        </nav>

        <!-- End of Topbar -->
<?php
    if(isset($_GET['msg'])){
      $msg = $_GET['msg'];
      echo "
      <div class='alert alert-success' role='alert'>
        $msg
      </div> ";
    }

    if(isset($_GET['msg_erro'])){
      $msg = $_GET['msg_erro'];
      echo "
      <div class='alert alert-danger' role='alert'>
        $msg
      </div> ";
    }
    ?>
        <!-- Corpo Da pagina -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-cross"></i>   Controle de Alunos</h1>
          

          </div>
           <?php         
                  if(isset($_GET['res'])){
                    $s = $_GET['res'];
                    if ($s=='error') {
                    echo '<div style="width: 50%; padding: 6px" class="alert alert-danger" role="alert">
                          Aluno não pode ter o Certificado. Limite de faltas ultrapassada!
                       </div>';
                    }
                  if($s=='sucesso'){
                    echo '<div style="width: 50%;  padding: 6px;" class="alert alert-success" role="alert">
                           Alterado com sucesso!
                       </div>';
                  }
                          }
                  else{
                  $s = "";
                   }
               ?>
               <div class="card-body">
              <div class="">
                <script>
                  function funcao12(){
                  var x;
                  var r=confirm("Tem Certeza que deseja Excluir Registro?");
                      if (r==true){
                        
                     }else {
                      location.href="relatorio_sacramento.php";
                     }
                  }
              </script>
             </div>
               <br>
                <table class="table" id="Table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Matricula</th>
                      <th>Falta</th>
                      <th>Presença</th>
                      <th>Certificado</th>
                    </tr>
                  </thead>
                   <tbody id="Tabela" >
                     <?php
   
        while($row = $result->fetch(PDO::FETCH_OBJ)){
         
          echo '<tr>';
          echo  '<td >'.$row -> nome . '</td>'. 
              '<td>'. $row -> matricula . '</td>
            

              <td> 
                <a href="mais_falta.php?mais=1&id='.$row -> idAluno.'"><button style="background: #4169E1"  name="mais" id="mais" value="+"><i class="fas fa-plus"></i></button></a>
                <input type="text" name="format" value='.$row -> falta.' id="format" size="2"/>
                <a href="menos_falta.php?menos=1&id='.$row -> idAluno.'"><button style="background: #4169E1"  name="menos" id="menos" value="-"><i class="fas fa-minus"></i></button></a>'.'
              </td>
              <td>
                <a href="mais_presenca.php?mais=1&id='.$row -> idAluno.'"><button style="background: #4169E1" name="mais" id="mais" value="+"><i class="fas fa-plus"></i></button></a>
                  <input type="text" name="format" value='.$row -> presenca.' id="format" size="2" />
                <a href="menos_presenca.php?menos=1&id='.$row -> idAluno.'"><button style="background: #4169E1"  name="menos" id="mais" value="-"><i class="fas fa-minus"></i></button></a>'.' 
               <td> <a  target="_blank" href="verificar_faltas.php?id='.
               $row -> idAluno.'"><i class=" fas fa-bible"></i></a>'.'</td>';
        echo '</tr>';
        }
        $conn = null;
     
?>
                   </tbody>
                </table>
                 <script type="text/javascript">
                   function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}

</script>
              </div>
            </div>
              
            </div>
          </div>

        </div>
     
     </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
<?php 
}else{
  header("Location:login.html");
} ?>
</body>

</html>


