<?php

    if(!empty($_GET['id']))
    {

        include_once('../php/config.php');


    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM editora WHERE id=$id";

    $result= $conexao->query($sqlSelect);


    if($result->num_rows > 0)
    {

    $sqlDelete = "DELETE FROM editora WHERE id=$id";

    $resultDelete= $conexao->query($sqlDelete);

    }
    }

    header('Location:../paginas_iniciais/editora.php');

?>