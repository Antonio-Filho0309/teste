<?php

include_once('../php/config.php');

if(isset($_POST['submit'])){


  include_once('../php/config.php');

  $nome = $_POST['select_nome'];
  $livro = $_POST['select_livro'];
  $dataal = $_POST['dataal'];
  $dataprev = $_POST['dataprev'];
  $datadevo = $_POST['datadevo'];

  $sqlaluguel="SELECT * FROM  aluguel WHERE nome ='$nome' and livro='$livro'";

  $resultado = $conexao->query($sqlaluguel);

  if(mysqli_num_rows($resultado)==1){

    echo "<script>window.alert('Usúario não pode Alugar o mesmo livro')</script>";

}else{
  $result = mysqli_query($conexao, "INSERT INTO aluguel(nome,livro,dataal,dataprev,datadevo) VALUES ('$nome','$livro','$dataal','$dataprev','$datadevo')");
  
}



}

$sql = "SELECT * FROM aluguel ORDER BY id ASC";

if(!empty($_GET['pesquisar'])){
  $data = $_GET['pesquisar'];

  $sql = "SELECT * FROM aluguel WHERE nome LIKE '%$data%'OR livro LIKE '%$data%' OR dataal LIKE '%$data%' ORDER BY id ASC";
}
else{
   $sql = "SELECT * FROM aluguel ORDER BY id ASC";
}

$result = $conexao -> query($sql);

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel</title>
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
                <a class="nav-link active" href="#"> <img src="../img/aluguel.png" alt="Aluguel" width="20px" height="20px">    Aluguel</a>
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
            <div class="box" id="cadastro_aluguel">
                <img src="../img/botao-x.png" alt="Fechar" id="btn-fechar" onclick="fecharModal('vis-modal')">
                <br>
                <form action="aluguel.php" method='POST'>
                    <fieldset>
                        <legend><b>Aluguel de Livro</b></legend>
                        <br>
                        <label for="select_nome">Nome:</label>
                  <br>
                  <select name="select_nome" id="select_nome">
                    <option>Selecione</option>
                    <?php 
                    $result_select_editora = "SELECT * FROM usuario";
                    $resultado_select_editora = mysqli_query($conexao ,  $result_select_editora ) ;
                    while($row_editora = mysqli_fetch_assoc($resultado_select_editora )){ ?>
                      <option value="<?php echo $row_editora['nome'];?>">
                      <?php echo $row_editora['nome'];?>
                      </option><?php
                    }
                    ?>
                  </select>
                        <br><br>
                        <label for="select_nome">Livro:</label>
                        <br>
                        <select name="select_livro" id="select_livro">
                    <option>Selecione</option>
                    <?php 
                    $result_select_editora = "SELECT * FROM livro";
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
                            <input type="date" name="dataal" id="dataal" class="inputUser" placeholder=" " required>
                            <label for="dataal" class="labelInput">Data do aluguel</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="date" name="dataprev" id="dataprev" value="0">
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="date" name="dataprev" id="dataprev" class="inputUser" placeholder=" " required>
                            <label for="datadevo" class="labelInput">Data de Devolução</label>
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
        <h1 class="titulo-pag">Aluguel</h1> <a href="#" class="btn-new" onclick="abrirModal('vis-modal')">Criar Novo</a>
      </div>
      <hr>
        <div class="container">

          <form action="">
            <div class="box-search">
              <input type="search" id="barra-search" placeholder="Pesquisar aluguel" name="pesquisar">
              <button id="lupa" type="submit">
                <img src="../img/search.svg" alt="lupa">
              </button>
            </div>
          </form>


          <table class="table text-white table-bg mt-4">
            <thead class="thead bg-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Livro</th>
                <th scope="col">Data de Aluguel</th>
                <th scope="col">Data de Previsão</th>
                <th scope="col">Data de Devolução</th>
                <th scope="col">...</th>
              </tr>
            </thead>
            <tbody>
               <?php
              while($user_data = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$user_data['id']."</td>";
                echo "<td>".$user_data['nome']."</td>";
                echo "<td>".$user_data['livro']."</td>";
                echo "<td>".$user_data['dataal']."</td>";
                echo "<td>".$user_data['datadevo']."</td>";
                echo "<td>
                <a href='../editar/editar_aluguel.php?id=$user_data[id]' class='butao' id='bt1'>
                <img src='../img/pencil.svg' alt='editar' >
                </a>
                <a href='../delete/delete_aluguel.php?id=$user_data[id]' class='butao' id='bt2'>
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
    <script src="../js/modal.js"></script>

    <script>
      var search = document.getElementById('barra-search')
        search.addEventListener("keydown", function(event){
            if(event.key === "Enter"){
                searchData();
            }
        })
        function searchData(){
            window.location = "aluguel.php?search=" = search.value
        }

    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</body>
</html>