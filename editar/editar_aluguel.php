<?php
if(!empty($_GET['id'])){

    include_once('../php/config.php');


    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM aluguel WHERE id=$id";

    $result= $conexao->query($sqlSelect);


    if($result->num_rows > 0){

        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $livro = $user_data['livro'];
            $dataal = $user_data['dataal'];
            $datadevo = $user_data['datadevo'];
           
        }

       //teste print_r($nome);

    }else{
        header('Location:../paginas_iniciais/aluguel.php');

    }
    

}else{
    header('Location:../paginas_iniciais/aluguel.php');

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/editar.css">
    <title>Editar Aluguel</title>
</head>
<body>
    <body>
    <div id="vis-modal" class="modal">
            <br><br><br><br><br><br>
            <div class="box" id="cadastro_aluguel">
                <img src="../img/botao-x.png" alt="Fechar" id="btn-fechar" onclick="fecharModal('vis-modal')">
                <br>
                <form action="../php/save_aluguel.php" method='POST'>
                    <fieldset>
                        <legend><b>Editar  Aluguel</b></legend>
                        <br>
                        <div class="label-float">
                            <input type="text" name="nome" id="nome" class="inputUser"  placeholder=" " required>
                            <label for="nome" class="labelInput">Nome do Usúario</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="text" name="livro" id="livro" class="inputUser" placeholder=" " required>
                            <label for="livro" class="labelInput">Livro</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="date" name="dataal" id="dataal" class="inputUser" placeholder=" " required>
                            <label for="dataal" class="labelInput">Data do aluguel</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="date" name="datadevo" id="datadevo" class="inputUser" placeholder=" " required>
                            <label for="datadevo" class="labelInput">Data de Devolução</label>
                        </div>
                        <br>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                    </fieldset>
                    <br><br>
                    <input type="submit" name="update" id="update" value="Mudar">
            
                </form>
            </div>
        </div>
     <script src="../js/modal.js"></script>
</body>
</html>