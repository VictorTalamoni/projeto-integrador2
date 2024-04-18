<?php
require_once("dbconnection.php");
    if(isset($_GET['Del']))
    {
            $cpf = $_GET['Del'];
            $query = " delete from pessoas where cpf = '".$cpf."' ";
            $resultados = mysqli_query($con,$query);

            if($resultados)
            {
                echo("<script>alert('Deletado com sucesso!')</script>");
                echo("<script>window.location = 'index.php';</script>");
            }
            else
            {
                echo 'Por favor, cheque o seu registro';
            }
    }
?>