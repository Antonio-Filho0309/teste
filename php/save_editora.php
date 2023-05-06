<?php

include_once('config.php');

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $nome = $_POST['nomeeditora'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
 

    $sqlUpdate = "UPDATE editora SET nome='$nome', email='$email',telefone='$telefone',telefone='$telefone' WHERE id='$id'";

    $result=$conexao->query($sqlUpdate);
}

header('Location: ../paginas_iniciais/editora.php');

?>