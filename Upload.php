<?php
include('dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css" />
    <title>TESTE1</title>
    <style>
a {
    text-decoration: none;
    color: #9370DB;
  }
        </style>
</head>
<body>
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
</body>
</html>

<?php
 
 if (isset($_POST['submit'])) {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $numero = $_POST['number'];
    $numeror = $_POST['numberr'];
    $nomer = $_POST['nomer'];

    // Verificar se o CPF já existe
    $verificar_cpf = mysqli_query($con, "SELECT * FROM pessoas WHERE cpf = '$cpf'");
    if (mysqli_num_rows($verificar_cpf) > 0) {
        echo("<script>alert('Erro, CPF duplicado!')</script>");
        echo("<script>window.location = 'Upload.php';</script>");
    } else {
        $query = mysqli_query($con, "INSERT INTO pessoas (cpf, nome, telefone, telefone_referencia, titular_numero_referencia) 
        VALUES ('$cpf','$nome','$numero','$numeror','$nomer')");

        if ($query) {
            echo("<script>alert('Cadastro feito com sucesso!')</script>");
            echo("<script>window.location = 'index.php';</script>");
        } 
    }
}
    
?>
