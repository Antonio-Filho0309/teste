<?php
if(!empty($_GET['id'])){

    include_once('../php/config.php');


    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario WHERE id=$id";

    $result= $conexao->query($sqlSelect);


    if($result->num_rows > 0){

        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
        }

       //teste print_r($nome);

    }else{
        header('Location:../paginas_iniciais/user.php');

    }
    

}else{
    header('Location:../paginas_iniciais/user.php');

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
    <title>Editar Usúario</title>
</head>
<body>
        <div class="box">
            <a href="../paginas_iniciais/user.php"><img src="../img/botao-x.png" alt="Fechar" id="btn-fechar" ></a>
            <br>
            <form action="../php/savedituser.php" method='POST'>
                <fieldset>
                    <legend><b>Editar Usúario</b></legend>
                    <br>
                    <div class="label-float">
                        <input type="text" name="nome" id="nome" class="inputUser"  placeholder=" "  value="<?php  echo $nome ?>" required>
                        <label for="nome" class="labelInput">Nome completo</label>
                    </div>
                    <br><br>
                    <div class="label-float">
                        <input type="text" name="email" id="email" class="inputUser" placeholder=" " value="<?php  echo $email ?>" required>
                        <label for="email" class="labelInput">Email</label>
                    </div>
                    <br><br>
                    <div class="label-float">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder=" "  value="<?php  echo $telefone ?>" required>
                        <label for="telefone" class="labelInput">Telefone</label>
                    </div>
                    <br><br>
                    <div class="label-float">
                        <input type="text" name="cidade" id="cidade" class="inputUser" placeholder=" "  value="<?php  echo $cidade ?>" required>
                        <label for="cidade" class="labelInput">Cidade</label>
                    </div>
                    <br><br>
                    <div class="label-float">
                        <input type="text" name="estado" id="estado" class="inputUser" placeholder=" " value="<?php  echo $estado ?>" required>
                        <label for="estado" class="labelInput">Estado</label>
                    </div>
                    <br><br>
                    <div class="label-float">
                        <input type="text" name="endereco" id="endereco" placeholder=" "  class="inputUser"  value="<?php  echo $endereco ?>" required>
                        <label >Endereço</label>
                    </div>
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </fieldset>
                <br><br>
                <input type="submit" name="update" id="update" value="Mudar">
        
            </form>
        </div>



    <script src="../js/modal.js"></script>
</body>
</html>