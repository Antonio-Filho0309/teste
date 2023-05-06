<?php

include_once('config.php');

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $sqlUpdate = "UPDATE usuario SET nome='$nome',email='$email',telefone='$telefone',cidade='$cidade',estado='$estado',endereco='$endereco' WHERE id='$id'";

    $result=$conexao->query($sqlUpdate);
}

header('Location: ../paginas_iniciais/user.php');

?>