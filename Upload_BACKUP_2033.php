<?php
include('dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css" />
    <title>Upload de Arquivos</title>
    <style>
a {
    text-decoration: none;
    color: #4caf50;
=======
    <link rel="stylesheet" type="text/css" href="css.css" />
    <title>TESTE1</title>
    <style>
a {
    text-decoration: none;
    color: #9370DB;
>>>>>>> c2a12dd3a595883db6101aeafc2829ada1f09901
  }
        </style>
</head>
<body>
<<<<<<< HEAD
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

            <label for="foto"> Insira uma Foto :</label>
            <input type="file"  name="foto" id="foto" title="Insira uma foto">
    
            <input type="submit" value="Enviar" name="submit">
        </form>
    </div>
    <h3 style="text-indent: 1%; text-align:center "><a href="index.php"> Página Inicial</a><h3>
=======
<div class="campo">
<h1 id="titulos">Cadastro de pessoas</h1>
</div>

<form method="POST">
<fieldset class="grupo">
<div class="form">
<label for="nome"><strong>CPF: </strong></label>
<input type="text" maxlength="11" name="cpf" id="cpf" required>
<br> <br>
<label for="nome"><strong>Nome: </strong></label>
<input type="text" name="nome" id="nome" required>
<br> <br>
<label for="nome"><strong>Número: </strong></label>
<input type="number" maxlength="11" name="number" id="number">
<br> <br>
<label for="nome"><strong>Número de referência: </strong></label>
<input type="number" maxlength="11" name="numberr" id="numberr">
<br> <br>
<label for="nome"><strong>Nome do titular de referência: </strong></label>
<input type="text" name="nomer" id="nomer">
<br> <br>
</div>
</fieldset>
<div class="button">
<input type="submit" name="submit" value="Enviar">
</form>
<p>
<h3 style="text-indent: 1%"><a href="index.php"> Página Inicial</a><h3>
</body>
<div id="map"></div>
<script src="script.js"></script>
<script>
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADRwYSC304AJ3JVGWt
LyX_-o-bOpcS87g&callback=initMap" async defer>
</script>
>>>>>>> c2a12dd3a595883db6101aeafc2829ada1f09901
</body>
</html>

<?php
 
 if (isset($_POST['submit'])) {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $numero = $_POST['number'];
    $numeror = $_POST['numberr'];
    $nomer = $_POST['nomer'];

<<<<<<< HEAD
    $foto = $_FILES['foto'];
    $pasta = "fotos/";
    $nomedafoto = $foto['name'];
    $novonomedafoto = uniqid();
    $extensao = strtolower(pathinfo($nomedafoto,PATHINFO_EXTENSION));
    $fotomy = $novonomedafoto . "." . $extensao;


=======
>>>>>>> c2a12dd3a595883db6101aeafc2829ada1f09901
    // Verificar se o CPF já existe
    $verificar_cpf = mysqli_query($con, "SELECT * FROM pessoas WHERE cpf = '$cpf'");
    if (mysqli_num_rows($verificar_cpf) > 0) {
        echo("<script>alert('Erro, CPF duplicado!')</script>");
        echo("<script>window.location = 'Upload.php';</script>");
    } else {
<<<<<<< HEAD
        if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg"){
            echo("<script>alert('Erro, imagem não aceita!')</script>");
            echo("<script>window.location = 'Upload.php';</script>");
        }
        else {
        move_uploaded_file($foto['tmp_name'], $pasta . $novonomedafoto . "." . $extensao);
        $query = mysqli_query($con, "INSERT INTO pessoas (cpf, nome, telefone, telefone_referencia, titular_numero_referencia, imagem) 
        VALUES ('$cpf','$nome','$numero','$numeror','$nomer','$fotomy')");
        }

        if ($query) {
            echo("<script>alert('Cadastro feito com sucesso!')</script>");
            echo("<script>window.location = 'Upload.php';</script>");
=======
        $query = mysqli_query($con, "INSERT INTO pessoas (cpf, nome, telefone, telefone_referencia, titular_numero_referencia) 
        VALUES ('$cpf','$nome','$numero','$numeror','$nomer')");

        if ($query) {
            echo("<script>alert('Cadastro feito com sucesso!')</script>");
            echo("<script>window.location = 'index.php';</script>");
>>>>>>> c2a12dd3a595883db6101aeafc2829ada1f09901
        } 
    }
}
    
?>
