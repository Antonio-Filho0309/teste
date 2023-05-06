<?php

include_once('../php/config.php');

if(isset($_POST['submit'])){

  /*testar para saber se a informações estão chegando
  print_r($_POST['nome']);
  print_r('<br>');
  print_r($_POST['email']);
  print_r('<br>');
  print_r($_POST['telefone']);
  */

  include_once('../php/config.php');

  $nome = $_POST['nome'];
  $autor = $_POST['autor'];
  $editora = $_POST['select_editora'];
  $data = $_POST['datal'];
  $estoque = $_POST['estoque'];

  $sqllivro="SELECT * FROM  livro WHERE nome ='$nome'";

  $resultado = $conexao->query($sqllivro);

  if(mysqli_num_rows($resultado)==1){

    echo "<script>window.alert('Livro já cadastrado')</script>";

}else{
  
  $result = mysqli_query($conexao, "INSERT INTO livro(nome,autor,editora,datal,estoque) VALUES ('$nome','$autor','$editora','$data','$estoque')"); 

}
  
 

}

$sql = "SELECT * FROM livro ORDER BY id ASC ";

if(!empty($_GET['pesquisar'])){
  $data = $_GET['pesquisar'];

  $sql = "SELECT * FROM livro WHERE nome LIKE '%$data%' OR autor LIKE '%$data%' OR editora LIKE '%$data%' OR datal LIKE '%$data%'  ORDER BY id ASC";
}
else{
   $sql = "SELECT * FROM livro ORDER BY id ASC";
}

$result = $conexao -> query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
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
                <a class="nav-link active" href="#"><img src="../img/livro.png" alt="Livro" width="20px" height="20px">    Livro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aluguel.php"> <img src="../img/aluguel.png" alt="Aluguel" width="20px" height="20px">    Aluguel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="editora.php"> <img src="../img/editora.png" alt="Editora" width="20px" height="20px">   Editora</a>
              </li>
              
            </ul>
            <a class="btn btn-outline-danger" href="../php/sair.php" role="button">Sair</a>
          </div>
        </div>
         
      </nav>
    <!--Fim do Cabeçalho-->
    
    <!--Modal-->
    <div id="vis-modal" class="modal">
      <br><br><br><br><br><br>
      <div class="box" id="cadastro_livro">
          <img src="../img/botao-x.png" alt="Fechar" id="btn-fechar" onclick="fecharModal('vis-modal')">
          <br>
          <form action="livro.php" method="POST">
              <fieldset>
                  <legend><b>Cadastro  de Livro</b></legend>
                  <br><br>
                  <div class="label-float">
                      <input type="text" name="nome" id="nome" class="inputUser"  placeholder=" " required>
                      <label for="nome" class="labelInput">Nome do Livro</label>
                  </div>
                  <br><br>
                  <div class="label-float">
                      <input type="text" name="autor" id="autor" class="inputUser" placeholder=" " required>
                      <label for="autor" class="labelInput">Autor</label>
                  </div>
                  <br><br> 
                  <label for="select_editora">Editora:</label>
                  <br>
                  <select name="select_editora" id="select_editora">
                    <option>Selecione</option>
                    <?php 
                    $result_select_editora = "SELECT * FROM editora";
                    $resultado_select_editora = mysqli_query($conexao ,  $result_select_editora ) ;
                    while($row_editora = mysqli_fetch_assoc($resultado_select_editora )){ ?>
                      <option value="<?php echo $row_editora['nome'];?>">
                      <?php echo $row_editora['nome'];?>
                      </option><?php
                    }
                    ?>
                  </select>
                  <br><br>
                  <div class="label-float">
                      <input type="date" name="datal" id="datal" class="inputUser" placeholder=" " required>
                      <label for="datal" class="labelInput">Data de Lançamento</label>
                  </div>
                  <br><br>
                  <div class="label-float">
                      <input type="number" name="estoque" id="estoque" class="inputUser" placeholder=" " required>
                      <label for="estoque" class="labelInput">Estoque</label>
                  </div>
                  <br>
              </fieldset>
              <br><br>
              <input type="submit" name="submit" id="submit" value="Cadastrar">
      
          </form>
      </div>
  </div>

      <!--fim do modal-->

    <!--Corpo--->
    <main>
    
      <div class="header-pag">
        <h1 class="titulo-pag">Livro</h1> <a href="#" class="btn-new" id="btn-livro" onclick="abrirModal('vis-modal')">Criar Novo</a>
      </div>
      <hr>
        <div class="container">

          <form action="">

            <div class="box-search">
              <input type="search" id="barra-search" placeholder="Pesquisar livro" name="pesquisar">
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
                <th scope="col">Autor</th>
                <th scope="col">Editora</th>
                <th scope="col">Data de Lançamento</th>
                <th scope="col">Estoque</th>
                <th scope="col">...</th>
              </tr>
            </thead>
            <tbody>
            <?php
              while($user_data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['nome']."</td>";
                echo "<td>".$user_data['autor']."</td>";
                echo "<td>".$user_data['editora']."</td>";
                echo "<td>".$user_data['datal']."</td>";
                echo "<td>".$user_data['estoque']."</td>";
                echo "<td>
                <a href='../editar/editar_livro.php?id=$user_data[id]' class='butao' id='bt1'>
                <img src='../img/pencil.svg' alt='editar' >
                </a>
                <a href='../delete/delete_livro.php?id=$user_data[id]' class='butao' id='bt2'>
                <img src='../img/trash3-fill.svg' alt='Apagar' >
                </a>
                </td>";
                echo "</tr>";
              }
            ?>
            </tbody>
          </table>
        </div>
          
        </div>
    </main>
    <!---fim do corpo-->

    <!--Script-->
    <script src="../js/modal.js"></script>

    <script>
      var search = document.getElementById('barra-search')
        search.addEventListener("keydown", function(event){
            if(event.key === "Enter"){
                searchData();
            }
        })
        function searchData(){
            window.location = "livro.php?search=" = search.value
        }

    </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</body>
</html>