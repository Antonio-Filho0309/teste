<?php
  session_start();
  //print_r($_SESSION);

  if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true )){
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: home.php');
  }
  $logado = $_SESSION['nome'];

  include_once('../php/config.php');

  $sqllivro="SELECT livro, count(livro)
  FROM aluguel WHERE ";

  $resultadoLivro=$conexao->query($sqllivro);




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wda Livraria</title>
    <!--links-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/mediaquerry.css">
</head>
<body>
      <!--Cabeçalho-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
        <div class="container-fluid">
          <a class="" href="#"><img src="../img/WDA LIVRARIA4.png" alt=" wda né " height="70px" width="267px" id="inicio"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="lista">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"> <img src="../img/home.png" alt="Início" width="20px" height="20px">   Início</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user.php"> <img src="../img/user.png" alt="user.png" width="20px" height="20px">    Usuários</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="livro.php"><img src="../img/livro.png" alt="Livro" width="20px" height="20px">    Livro</a>
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

    <!--Corpo--->
        <main>
          <?php 
            echo "<h1>&nbsp; Olá, $logado!</h1>";
            while($livro_data = mysqli_fetch_assoc($resultadoLivro)){
                if(mysqli_num_rows($resultadoLivro)>=3){
              echo "<p>".$livro_data['livro']."</p>";
                }else{
                  echo "<p> deu ruim </p>";
                }

            }
          ?>
          <br>
          <div id="grafico" class="container bg-light">
            <h1>Livros mais alugados: </h1>
            <canvas id="mychart">

            </canvas>
          </div>
          <div id="maisalugado" class="container bg-light">
            <h1>O  livro mais alugado: </h1>
            <div id="top"> aqui vai aparecer o mais alugado</div>
            <img src="../img/livromaisvendido.png" alt="Livro" id="livroalugado">
          </div>
          <div id="container3" class="container bg-light">
            <h1>Quantidade de livros:</h1>
            <strong>Emprestados:</strong>
            <div id="Emprestados">
              aqui vai aparecer os livros..
            </div>
            <strong>Atrasados:</strong>
            <div id="Atrasados">
              aqui vai aparecer os livros..
            </div>
            <img src="../img/livros.png" alt="Livros" width="120px" height="120px" id="livros">
          </div>
          <div id="container4" class="container bg-light">
            <h1>Livros:</h1>
            <p><strong>Entregues no prazo:</strong></p>
            <div id="dentroprazo"> aqui vai aparecer os livros</div>
            <p><strong>Entregues fora do prazo:</strong></p>
            <div id="foraprazo"> aqui vai aparecer os livros</div>
            <img src="../img/lendo-um-livro.png" alt="Lendo livros" id="lendolivro">
          </div>
    </main>
    <!--Fim do Corpo-->

  <!--Script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</body>
</html>