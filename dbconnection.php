<?php
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    $con = mysqli_connect("localhost", "root", "root", "projeto_integrador");
    if($con == false){
        die("Conexão falhou". mysql_connect_error());
    }
?>