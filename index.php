<?php
include('dbconnection.php');
$query = "select * from pessoas";
$result = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css" />
    <script src="css/js/bootstrap.min.js"> </script>
    <title>Página Inicial</title>
</head>
<body class="bg-success">
    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 " style="color: green;">Página Inicial</span>
    <a class="navbar-brand" href="Upload.php" style= "color: green;">Cadastro de Pessoas</a>
  </div>
</nav>

<div class="container">
<div class="row mt-4">
<div class="col">
<div class="card mt-5">
<div class="card-header">
    <h3 class="display-6 text-center" style= "color: green;"> Pessoas cadastradas </h2>
</div>
<div class="card-body">
    <div class="table-responsive">
<table class="table table-bordered text-center ">
    <tr class="table-success">
        <td>CPF</td>
        <td>Nome</td>
        <td>Telefone</td>
        <td>Telefone de Referência</td>
        <td>Titular do número de referência</td>
        <td> Editar </td>
        <td> Apagar </td>
        <td> Perfil </td>
    </tr>
    <tr>
        <?php

            while($row = mysqli_fetch_assoc($result)){
        ?>
        <td>
            <?php 
                echo $row['cpf'];
            ?>
        </td>
        <td>
            <?php 
                echo $row['nome'];
            ?>
        </td>
        <td>
            <?php 
                echo $row['telefone'];
            ?>
        </td>
        <td>
            <?php 
                echo $row['telefone_referencia'];
            ?>
        </td>
        <td>
            <?php 
                echo $row['titular_numero_referencia'];
            ?>
        </td>
        <td>
            <?php
            $cpf = $row['cpf'];
            ?>
                <a href="edit.php?GetID=<?php echo $cpf?>" class="btn btn-success">Editar</a>
        </td>
        <td>
                <a href="apagar.php?Del=<?php echo $cpf?>" class="btn btn-success">Apagar</a>
        </td>
        <td>
                <a href="perfil.php?Perfil=<?php echo $cpf?>" class="btn btn-success">Visualizar</a>
        </td>
</tr>
        <?php
            }
        ?>
    </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>