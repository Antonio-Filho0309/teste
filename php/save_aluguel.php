<?php

include_once('config.php');

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $nome = $_POST['nome'];
    $livro = $_POST['livro'];
    $dataal = $_POST['dataal'];
    $datadevo = $_POST['datadevo'];
  

    $sqlUpdate = "UPDATE aluguel SET nome='$nome', livro='$livro', dataal='$dataal', datadevo='$datadevo' WHERE id='$id'";

    $result=$conexao->query($sqlUpdate);
}

header('Location: ../paginas_iniciais/aluguel.php');

?>