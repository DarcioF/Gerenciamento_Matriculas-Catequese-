<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gerenciamento Sistema</title>
    <link rel="shortcut icon" type="image/x-png" href="./img/logo.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./css/slider.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/slider.css">

</head>

<body id="page-top">
<?php 
// Inicia sessões 
session_start(); 
 
// Verifica se existe os dados da sessão de login 
if(isset($_SESSION['nome']) && isset($_SESSION['senha']) && $_SESSION['codLog']==2) 
{ ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!--Imagem na tela-->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
        <div class="sidebar-brand-icon rotate-n-15">
           <i class="fas fa-church"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CatG</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!--Pagina Inicial -->
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">
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
            <a class="collapse-item" href="formUsu_cad.php">Usuários</a>
                     
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
            <a class="collapse-item" href="relatorio_usuario.php">Usuários</a>
            </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      

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

        <!-- Corpo Da pagina -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> <i class=" far fa-file-alt"></i>   Relatório</h1>
          </div>

           <input id="myInput" onkeyup="searchTable()" type="text" placeholder="Pesquise...">
               <br>
               <br>
               <?php         
                  if(isset($_GET['res1'])){
                    $s = $_GET['res1'];
                    if ($s=='error1') {
                    echo '<div style="width: 50%; padding: 6px" class="alert alert-danger" role="alert">
                          Error ao Deletar. O registro não pode ser deletado, pois está sendo relacionado!
                       </div>';
                    }
                  if($s=='sucesso1'){
                    echo '<div style="width: 50%;  padding: 6px;" class="alert alert-success" role="alert">
                           Apagado com sucesso!
                       </div>';
                  }
                          }
                  else{
                  $s = "";
                   }
               ?>
               <?php         
                  if(isset($_GET['res22'])){
                    $s = $_GET['res22'];
                    if ($s=='error22') {
                    echo '<div style="width: 50%; padding: 6px" class="alert alert-danger" role="alert">
                          Error ao Alterar!
                       </div>';
                    }
                  if($s=='sucesso22'){
                    echo '<div style="width: 50%;  padding: 6px;" class="alert alert-success" role="alert">
                           Alterado com sucesso!
                       </div>';
                  }
                          }
                  else{
                  $s = "";
                   }
               ?>
             <table class="table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th >Alterar</th>
                      <th>Deletar</th>
                    </tr>
                  </thead>
                   <tbody id="myTable">
                   
  <?php
    require_once './model/conexao.php';
    require_once './model/LoginDAO.php';

    
    $sa = new LoginDAO();

    $result = $sa -> listar_login($conn); 
    if ($result) {      
        while($row = $result->fetch(PDO::FETCH_OBJ)){
         
          echo '<tr class="resultado">';
          echo  '<td>'. $row -> nome .'</td>
              <td> <a href="form_up_usu.php?id='.
               $row -> idUsu.'"><i class=" far fa-edit"></i></a>'.'</td>
              <td><a value="id'.
               $row -> idUsu.'"><a href="deletar_usu.php?id='.$row -> idUsu.'"><button class="dropdown-item" onclick=" return confirm('."'Deseja deletar o registo?'".')"><i class="fa fa-times"></i></button></a></td>';
        echo '</tr>';
        }
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

              <div style="margin-top: 30px"><h6>Direitos reservados a Darcio Ferreira<br> 2019</h6></div>
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
