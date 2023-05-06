<?php
if(!empty($_GET['id'])){

    include_once('../php/config.php');


    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM editora WHERE id=$id";

    $result= $conexao->query($sqlSelect);


    if($result->num_rows > 0){

        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
        }

       //teste print_r($nome);

    }else{
        header('Location:../paginas_iniciais/editora.php');

    }
    

}else{
    header('Location:../paginas_iniciais/editora.php');

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
    <title>Editar  Editora</title>
</head>
<body>
    <body>
        <div id="vis-modal" class="modal">
            <br><br><br><br><br><br>
            <div class="box" id="cadastro_editora">
                <img src="../img/botao-x.png" alt="Fechar" id="btn-fechar" onclick="fecharModal('vis-modal')">
                <br>
                <form action="../php/save_editora.php" method='POST'>
                    <fieldset>
                        <legend><b>Editar Editora</b></legend>
                        <br>
                        <div class="label-float">
                            <input type="text" name="nomeeditora" id="nomeeditora" class="inputUser"  placeholder=" " value="<?php  echo $nome ?>" required>
                            <label for="nomeeditora" class="labelInput">Nome da Editora</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="text" name="email" id="email" class="inputUser" placeholder=" " value="<?php  echo $email ?>" required>
                            <label for="email" class="labelInput">Email</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder=" " value="<?php  echo $telefone ?>" required>
                            <label for="telefone" class="labelInput">Telefone</label>
                        </div>
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