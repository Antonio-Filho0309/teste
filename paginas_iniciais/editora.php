<?php
include_once('../php/config.php');
if(isset($_POST['submit'])){

  /*testar para saber se a informações estão chegando
  print_r($_POST['nomeeditora']);
  print_r('<br>');
  print_r($_POST['email']);
  print_r('<br>');
  print_r($_POST['telefone']);
  */

  include_once('../php/config.php');

  $nome = $_POST['nomeeditora'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];

  $sqleditora="SELECT * FROM  editora WHERE nome ='$nome'";

  $resultado = $conexao->query($sqleditora);

  if(mysqli_num_rows($resultado)==1){

    echo "<script>window.alert('Editora já cadastrada')</script>";

}else{
  
  $result = mysqli_query($conexao, "INSERT INTO editora(nome,email,telefone) VALUES ('$nome','$email','$telefone')");

}
  
}
$sql = "SELECT * FROM editora ORDER BY id ASC";


if(!empty($_GET['pesquisar'])){
  $data = $_GET['pesquisar'];

  $sql = "SELECT * FROM  editora WHERE nome LIKE '%$data%' ORDER BY id ASC";
}
else{
   $sql = "SELECT * FROM editora ORDER BY id ASC";
}

$result = $conexao -> query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editora</title>
    <!--links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <link rel="stylesheet" href="../css/mediaquerry.css">
</head>
<body>
      <!--Cabeçalho-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="" href="inicio.php"><img src="../img/WDA LIVRARIA4.png" alt=" wda né " height="70px" width="267px" id="inicio"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="lista">
              <li class="nav-item">
                <a class="nav-link"  href="inicio.php"> <img src="../img/home.png" alt="Início" width="20px" height="20px">   Início</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="user.php"> <img src="../img/user.png" alt="user.png" width="20px" height="20px">    Usuários</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="livro.php"><img src="../img/livro.png" alt="Livro" width="20px" height="20px">    Livro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aluguel.php"> <img src="../img/aluguel.png" alt="Aluguel" width="20px" height="20px">    Aluguel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#"> <img src="../img/editora.png" alt="Editora" width="20px" height="20px">   Editora</a>
              </li>
              
            </ul>
            <button class="btn btn-outline-danger" type="submit" id="btn-fds">Sair</button>
          </div>
        </div>
         
      </nav>
    <!--Fim do Cabeçalho-->
    <!--Modal-->
    <div id="vis-modal" class="modal">
      <br><br><br><br><br><br>
      <div class="box" id="cadastro_editora">
          <img src="../img/botao-x.png" alt="Fechar" id="btn-fechar" onclick="fecharModal('vis-modal')">
          <br>
          <form action="editora.php" method='POST'>
              <fieldset>
                  <legend><b>Cadastro  de Editora</b></legend>
                  <br><br>
                  <div class="label-float">
                      <input type="text" name="nomeeditora" id="nomeeditora" class="inputUser"  placeholder=" " required>
                      <label for="nomeeditora" class="labelInput">Nome da Editora</label>
                  </div>
                  <br><br>
                  <div class="label-float">
                      <input type="text" name="email" id="email" class="inputUser" placeholder=" " required>
                      <label for="email" class="labelInput">Email</label>
                  </div>
                  <br><br>
                  <div class="label-float">
                      <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder=" " required>
                      <label for="telefone" class="labelInput">Telefone</label>
                  </div>
              </fieldset>
              <br><br>
              <input type="submit" name="submit" id="submit" value="Cadastrar">
      
          </form>
      </div>
  </div>


    <!-- fim do Modal-->

    <!--Corpo--->
    <main>
      <div class="header-pag">
        <h1 class="titulo-pag">Editora</h1> <a href="#" class="btn-new" onclick="abrirModal('vis-modal')">Criar Novo</a>
      </div>
        <hr>
  
          <div class="container">
  
            <form action="">

              <div class="box-search">
                <input type="search" id="barra-search" placeholder="Pesquisar  editora" name="pesquisar">
                <button id="lupa">
                  <img src="../img/search.svg" alt="lupa">
                </button>
              </div>

            </form>
            
              <table class="table text-white table-bg mt-4">
                <thead class="thead bg-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">...</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php
              while($user_data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['nome']."</td>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['telefone']."</td>";

                echo "<td>
                <a href='../editar/editar_editora.php?id=$user_data[id]' class='butao' id='bt1'>
                <img src='../img/pencil.svg' alt='editar' >
                </a>
                <a href='../delete/delete_editora.php?id=$user_data[id]' class='butao' id='bt2'>
                <img src='../img/trash3-fill.svg' alt='Apagar' >
                </a>
                </td>";
                echo "</tr>";
              }
            ?>
                </tbody>
              </table>
          </div>
              
    </main>
    <!---fim do corpo-->
  <script src="../js/modal.js"></script>

  <script>
      var search = document.getElementById('barra-search')
        search.addEventListener("keydown", function(event){
            if(event.key === "Enter"){
                searchData();
            }
        })
        function searchData(){
            window.location = "editora.php?search=" = search.value
        }

    </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</body>
</html>