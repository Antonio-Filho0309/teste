<?php
    $dbHost='Localhost';
    $dbUsername='admin';
    $dbPassword='admin';
    $dbName='wda-livraria';

    $conexao=new mysqli( $dbHost,$dbUsername,$dbPassword,$dbName);

    /*para testa a conexão:
    if($conexao->connect_errno){
        echo 'Erro';
    } else{
        echo 'Conexão efetuada com sucesso';
    }
    */

?>