<?php
require_once("dbconnection.php");

    if(isset($_POST['editar']))
    {
        $cpf = $_GET['GetID'];
        $nome = $_POST['nome'];
        $numero = $_POST['number'];
        $numeror = $_POST['numberr'];
        $nomer = $_POST['nomer'];

        $query = "update pessoas set nome = '".$nome."', telefone = '".$numero."', telefone_referencia = '".$numeror."', titular_numero_referencia = '".$nomer."' where cpf = '".$cpf."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            echo("<script>alert('Atualizado com sucesso!')</script>");
            echo("<script>window.location = 'index.php';</script>");
        }
        else
        {
            echo ' Por favor cheque sua atualização';
        }
    }
    else
    {
        header("location:index.php");
    }
?>