<?php
include('dbconnection.php');
$query = "select * from pessoas";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <style>
        td{
            border: 1px solid black;
            font-weight: bold;
            text-align: center;
            line-height: 100%;
            width: 15%;
            height: 100%;
        }
        table{
            border: 1px solid black;
            background-color: #E6E6FA;
        }
        a {
    text-decoration: none;
    color: #9370DB;
  }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css" />
    <title>Página Inicial</title>
</head>
<body>
    <h2>Mostrar pessoas cadastradas </h2>
    <h3 style="text-indent: 85%"><a href="Upload.php"> Cadastrar novas Pessoas</a><h3>
    <br/>
    <table>
    <tr style="background-color: #9370DB; color:white; height:30px;">
        <td>CPF</td>
        <td>Nome</td>
        <td>Telefone</td>
        <td>Telefone de Referência</td>
        <td>Titular do número de referência</td>
        <td> Editar </td>
        <td> Apagar </td>
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
                <a href="edit.php?GetID=<?php echo $cpf?>">Editar </a>
        </td>
        <td>
                <a href="apagar.php?Del=<?php echo $cpf?>">Apagar </a>
        </td>
</tr>
        <?php
            }
        ?>

    </table>
</body>
</html>