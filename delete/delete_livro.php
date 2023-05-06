<?php

    if(!empty($_GET['id']))
    {
        include_once('../php/config.php');


    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM livro WHERE id=$id";

    $result= $conexao->query($sqlSelect);


    if($result->num_rows > 0)
    {

    $sqlDelete = "DELETE FROM livro WHERE id=$id";

    $resultDelete= $conexao->query($sqlDelete);

    }
    }

    header('Location:../paginas_iniciais/livro.php');

?>