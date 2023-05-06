<?php
session_start();
/*verificar se ele ta puxando algo
 print_r($_REQUEST);*/

    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha'])){
        //Acessa
        include_once('config.php');

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        /* teste
        print_r('NOME: ' .$nome);
        print_r('<br>' );
        print_r('senha: ' .$senha);
            */

        $sql="SELECT * FROM adm WHERE nome ='$nome' and senha ='$senha'";

        $result = $conexao->query($sql);

        /*teste para conferir se ta aparacendo algo
        print_r($result);
        print_r('<br>');
        print_r($sql);
        */

        if(mysqli_num_rows($result)<1){

            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            header('Location:../paginas_iniciais/home.php');
        }else{

            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location:../paginas_iniciais/inicio.php');
        }

    }else{
        //Não consegue acessar 
        header('Location:../paginas_iniciais/home.php');
    }

?>