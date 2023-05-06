<?php
if(!empty($_GET['id'])){

    include_once('../php/config.php');


    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM livro WHERE id=$id";

    $result= $conexao->query($sqlSelect);


    if($result->num_rows > 0){

        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $autor = $user_data['autor'];
            $editora = $user_data['editora'];
            $data = $user_data['datal'];
            $estoque = $user_data['estoque'];
        }

       //teste print_r($nome);

    }else{
        header('Location:../paginas_iniciais/livro.php');

    }
    

}else{
    header('Location:../paginas_iniciais/livro.php');

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
    <title>Editar Livro</title>
</head>
<body>
    <body>
        <div id="vis-modal" class="modal">
            <br><br><br><br><br><br>
            <div class="box" id="cadastro_livro">
                <img src="../img/botao-x.png" alt="Fechar" id="btn-fechar" onclick="fecharModal('vis-modal')">
                <br>
                <form action="../php/save_livro.php" method='POST'>
                    <fieldset>
                        <legend><b>Editar Livro</b></legend>
                        <br>
                        <div class="label-float">
                            <input type="text" name="nome" id="nome" class="inputUser"  placeholder=" "  value="<?php  echo $nome ?>" required>
                            <label for="nome" class="labelInput">Nome do Livro</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="text" name="autor" id="autor" class="inputUser" placeholder=" "  value="<?php  echo $autor ?>" required>
                            <label for="autor" class="labelInput">Autor</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="text" name="editora" id="editora" class="inputUser" placeholder=" "  value="<?php  echo $editora ?>" required>
                            <label for="editora" class="labelInput">Editora</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="date" name="data" id="data" class="inputUser" placeholder=" "  value="<?php  echo $data ?>" required>
                            <label for="data" class="labelInput">Data de Lançamento</label>
                        </div>
                        <br><br>
                        <div class="label-float">
                            <input type="number" name="estoque" id="estoque" class="inputUser" placeholder=" "   value="<?php  echo $estoque ?>" required>
                            <label for="estoque" class="labelInput">Estoque</label>
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