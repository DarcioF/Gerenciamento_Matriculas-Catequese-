<?php
	require_once './model/conexao.php';

	$id = $_GET["id"];
	//$idSacramento = $_GET["idSacramento"];
	//$idCatequista = $_GET["idCatequista"];

	$result = $conn -> query("SELECT * FROM aluno WHERE idAluno='{$id}'");
	if ($result){
		$row = $result->fetch();
		
		$nome = $row["nome"];
		$matricula = $row["matricula"];
		$local = $row["local"];
		$email = $row["email"];
		$telefone = $row["telefone"];
	  $idSacramento = $row["idSacramento"];
    $idCatequista= $row["idCatequista"];
		
	}
	
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
   <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.mask.min.js"></script>  
  <script type="text/javascript">
        function mascara(telefone){ 
            if(telefone.value.length == 0)
                telefone.value = '(' + telefone.value; 
            if(telefone.value.length == 3)
                telefone.value = telefone.value + ') '; 
 
            if(telefone.value.length == 8)
                telefone.value = telefone.value + '-';
  
}
    </script>
  <script type="text/javascript">
        function mascara2(telefone){ 
            if(telefone.value.length == 3)
                telefone.value = telefone.value+'.' ; 
            if(telefone.value.length == 7)
                telefone.value = telefone.value + '.'; 
 
            if(telefone.value.length == 11)
                telefone.value = telefone.value + '-';
  
}
    </script>
     <script>
    function buscar_Catequista(){
      var idSacramento = $('#idSacramento').val();
      if(idSacramento){
        var url = 'buscar_cat.php?idSacramento='+idSacramento;
        $.get(url, function(dataReturn) {
          $('#Catequista').html(dataReturn);
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

        <!-- Corpo Da pagina -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> <i class="far fa-address-card"></i>   Alterar Aluno</h1>
          </div>
               <?php         
                  if(isset($_GET['res'])){
                    $s = $_GET['res'];
                    if ($s=='error') {
                    echo '<div style="width: 50%; padding: 6px" class="alert alert-danger" role="alert">
                          Error ao Alterar. Selecione um Sacramento!
                       </div>';
                    }
                  if($s=='sucesso'){
                    echo '<div style="width: 50%;  padding: 6px;" class="alert alert-success" role="alert">
                           Cadastrado com sucesso!
                       </div>';
                  }
                          }
                  else{
                  $s = "";
                   }
               ?>
             <form  method="POST" action="alterar_aluno.php">
            <div class="form-row">
             <div class="form-group col-md-6">
               <label for="inputEmail4">Nome</label>
               <input type="hidden" name="idAluno" value="<?php echo $id; ?>">
                <input type="hidden" name="mat" value="<?php echo   $matricula; ?>">
               <input type="text" value="<?php echo $nome; ?>" class="form-control" name="nome" placeholder="Nome" required>
              </div>
              <div class="form-group col-md-6">
               <label for="inputPassword4">Matrícula</label>
               <input type="text" value="<?php echo $matricula; ?>" class="form-control" id="inputPassword4" name="matricula" placeholder="Matrícula" required>
                <?php         
                  if(isset($_GET['res22'])){
                    $s = $_GET['res22'];
                    if ($s=='error') {
                    echo '<p style="color: red ; font-size: 13px">
                          Matrícula já Cadastrada!
                       </p>';
                    }
                  
                          }
                  else{
                  $s = "";
                   }
               ?>
             </div>
           </div>
           <div class="form-group">
              <label for="inputAddress">Localidade</label>
             <input type="text" value="<?php echo $local; ?>" class="form-control" id="inputAddress" name="local" placeholder="Ex.: Igreja Matriz" required>
           </div>
            
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputCity">Email</label>
                <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" id="inputCity" placeholder="Email">
              </div>
              <div class="form-group col-md-4">
                <label for="inputCity">Telefone</label>
                <input type="text" id="celular"value="<?php echo $telefone; ?>" class="form-control"  onkeypress="mascara(this)" maxlength="15" name="telefone" placeholder="Telefone">
              </div>
              <div class="form-group col-md-4">
                <label for="inputEstado">Sacramento</label>
                <select id="idSacramento" onchange="buscar_Catequista()" name="idSacramento" class="form-control" required>
                <?php
                 require_once './model/conexao.php';
                     
                     $result = $conn -> query("SELECT * FROM sacramento WHERE idSacramento='{$idSacramento}'");
                      if ($result) {
                        while($row = $result->fetch(PDO::FETCH_OBJ)){
                          
                          echo '<option style="color: black; " value="'.$row -> idSacramento.'">'.$row-> descricao.'</option>';
                        }
                      }   
                ?>
                <?php
                 require_once './model/conexao.php';
                     echo '<option style="color: black; value="Selecione Uma Opção" disabled>Selecione Uma Opção...</option>';
                     $result = $conn -> query("SELECT * FROM sacramento");
                      if ($result) {
                        while($row = $result->fetch(PDO::FETCH_OBJ)){
                          
                          echo '<option style="color: black; " value="'.$row -> idSacramento.'">'.$row-> descricao.'</option>';
                        }
                      }   
                ?>

         			</select>
         			</div>
    					<div class="form-group col-md-4">
      					<label for="inputCEP">Catequista</label>
      					<select id="Catequista" name="idCatequista" class="form-control" required>
                <?php require_once './model/conexao.php';
                                       
                     $result = $conn -> query("SELECT * FROM catequista WHERE idCatequista='{$idCatequista}'");
                
                      if ($result) {
                        while($row = $result->fetch(PDO::FETCH_OBJ)){
                          
                          echo '<option style="color: black; " value="'.$row -> idCatequista.'">'.$row-> nomeC.'</option>';
                        }
                      }   
                ?>
                <?php require_once './model/conexao.php';
                	 
                	  echo '<option style="color: black; value="Selecione Uma Opção" disabled>Selecione Uma Opção...</option>';
                     $result = $conn -> query("SELECT * FROM catequista");
                
                      if ($result) {
                        while($row = $result->fetch(PDO::FETCH_OBJ)){
                          
                          echo '<option style="color: black; " value="'.$row -> idCatequista.'">'.$row-> nomeC.'</option>';
                        }
                      }   
                ?>

         				</select>
    					</div>
             </div>
        		 <div class="form-group">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            
             </div>
            </div>
          </form>
      
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
