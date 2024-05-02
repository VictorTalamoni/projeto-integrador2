<?php
include('dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css" />
    <script src="css/js/bootstrap.min.js"> </script>
    <title>Upload de Arquivos</title>
    <style>
a {
    text-decoration: none;
    color: #4caf50;
  }
        </style>
</head>
<body style="background-color: rgb(169, 250, 191);">

<nav class="navbar bg-body-tertiary">
<div class="container-fluid">
<span class="navbar-brand mb-0 h1 " style="color: green;">Cadastro de Pessoas</span>
<a class="navbar-brand" href="index.php" style= "color: green;">Página Inicial</a>
</div>
</nav>
<br>
<br>

<div class="container p-5 col-sm-8 justify-content-center rounded" style="background-color: rgb(242, 253, 245);">
    <form method="POST" enctype="multipart/form-data">
    <center><h1 style="color: green;">Cadastro de Pessoas</h1></center>
    <hr>
    
    <div class="mb-3">
    <label for="cpf" class="form-label"><strong>CPF: </strong></label>
    <input type="text" class="form-control col-sm-5" placeholder="Insira seu CPF" name="cpf" id="cpf" pattern="[0-9]{11}" title="Verifique o número" required>
    </div>

    <div class="mb-3">
    <label for="nome" class="form-label"><strong>Nome: </strong></label>
    <input type="text" name="nome" class="form-control" placeholder="Insira seu nome" id="nome" required>
    </div>

    <div class="mb-3">
    <label for="number"  class="form-label"><strong>Telefone: </strong></label>
    <input type="tel" name="number" class="form-control" placeholder="Insira seu número de telefone" pattern="[0-9]{11}" title="Verifique o número" id="number">
    </div>

    <div class="mb-3">
    <label for="numberr" class="form-label"><strong>Número de referência: </strong></label>
    <input type="tel" name="numberr" class="form-control" placeholder="Insira o número de telefone de um responsável" pattern="[0-9]{11}" title="Verifique o número" id="numberr">
    </div>

    <div class="mb-3">
    <label for="nomer" class="form-label"><strong>Nome do responsável: </strong></label>
    <input type="text" class="form-control" name="nomer" placeholder="Insira o nome do responsável" id="nomer">
    </div>

    <div class="mb-3">
    <label for="endereco" class="form-label"><strong>Insira seu endereço: </strong></label>
    <input type="text" class="form-control" name="endereco" placeholder="Insira o seu endereço aqui" id="endereco">
    </div>

    <label for="foto" class="form-label"><strong>Insira uma foto: </strong></label>
    <input type="file"  class="form-control" name="foto" id="foto" title="Insira uma foto">

    <hr>
    <div class="text-center">
    <div class="d-grid gap-2 col-2 btn-lg mx-auto">
    <input class="btn btn-success" type="submit" name="submit" value="Enviar">
    </div>
    </div>
    </form>
    </div>
 
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
