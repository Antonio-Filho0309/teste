<?php

include_once('config.php');

if(isset($_POST['update'])){

    $id=$_POST['id'];
    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $data = $_POST['data'];
    $estoque = $_POST['estoque'];

    $sqlUpdate = "UPDATE livro SET nome='$nome', autor='$autor',editora='$editora',datal='$data',estoque='$estoque' WHERE id='$id'";

    $result=$conexao->query($sqlUpdate);
}

header('Location: ../paginas_iniciais/livro.php');

?>