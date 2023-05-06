<?php
    session_start();
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location:../paginas_iniciais/home.php');
?>