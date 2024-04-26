<?php
include('dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css" />
    <title>Upload de Arquivos</title>
    <style>
a {
    text-decoration: none;
    color: #4caf50;
  }
        </style>
</head>
<body>
<div class="container">
        <h1>Cadastro</h1>
        <form method="POST" enctype="multipart/form-data">
            
            <label for="cpf">CPF:</label>
            <input type="text"  placeholder="Insira seu CPF" name="cpf" id="cpf" pattern="[0-9]{11}" title="Verifique o número" required>
    
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Insira seu nome" id="nome" required>
    
            <label for="number">Telefone: </label>
            <input type="tel" name="number" placeholder="Insira seu número de telefone" pattern="[0-9]{11}" title="Verifique o número" id="number">
    
            <label for="numberr">Número de Referência: </label>
            <input type="tel"  name="numberr" placeholder="Insira o número de telefone de um responsável" pattern="[0-9]{11}" title="Verifique o número" id="numberr">

            <label for="nomer">Nome do Responsável:</label>
            <input type="tel"  name="nomer" placeholder="Insira o nome do responsável" id="nomer">

            <label for="endereco">Insira seu endereço:</label>
            <input type="text"  name="endereco" placeholder="Insira o seu endereço aqui" id="endereco">

            <label for="foto"> Insira uma Foto :</label>
            <input type="file"  name="foto" id="foto" title="Insira uma foto">
    
            <input type="submit" value="Enviar" name="submit">
        </form>
    </div>
    <h3 style="text-indent: 1%; text-align:center "><a href="index.php"> Página Inicial</a><h3>
</body>
</html>

<?php
 
 if (isset($_POST['submit'])) {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $numero = $_POST['number'];
    $numeror = $_POST['numberr'];
    $nomer = $_POST['nomer'];
    $endereco = $_POST['endereco'];

    $foto = $_FILES['foto'];
    $pasta = "fotos/";
    $nomedafoto = $foto['name'];
    $novonomedafoto = uniqid();
    $extensao = strtolower(pathinfo($nomedafoto,PATHINFO_EXTENSION));
    $fotomy = $novonomedafoto . "." . $extensao;


    // Verificar se o CPF já existe
    $verificar_cpf = mysqli_query($con, "SELECT * FROM pessoas WHERE cpf = '$cpf'");
    if (mysqli_num_rows($verificar_cpf) > 0) {
        echo("<script>alert('Erro, CPF duplicado!')</script>");
        echo("<script>window.location = 'Upload.php';</script>");
    } else {
        if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg"){
            echo("<script>alert('Erro, imagem não aceita!')</script>");
            echo("<script>window.location = 'Upload.php';</script>");
        }
        else {
        move_uploaded_file($foto['tmp_name'], $pasta . $novonomedafoto . "." . $extensao);
        $query = mysqli_query($con, "INSERT INTO pessoas (cpf, nome, telefone, telefone_referencia, titular_numero_referencia, imagem, endereco) 
        VALUES ('$cpf','$nome','$numero','$numeror','$nomer','$fotomy','$endereco')");
        }

        if ($query) {
            echo("<script>alert('Cadastro feito com sucesso!')</script>");
            echo("<script>window.location = 'Upload.php';</script>");
        } 
    }
}
    
?>
