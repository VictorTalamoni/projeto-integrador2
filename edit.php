
    <?php
    include('dbconnection.php');

    $cpf = $_GET['GetID'];
    $query = "select * from pessoas where cpf='".$cpf."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $telefone_referencia = $row['telefone_referencia'];
        $titular_referencia = $row['titular_numero_referencia'];
    }
    ?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css.css" />
        <title>Edição de registro</title>
        <style>
    a {
        text-decoration: none;
        color: #9370DB;
      }
            </style>
    </head>
    <body>
    <div class="campo">
    <h1 id="titulos">Editar Pessoas</h1>
    </div>
    
    <form action="update.php?GetID=<?php echo $cpf ?>" method="POST">
    <fieldset class="grupo">
    <div class="form">
    <label for="nome"><strong>Nome: </strong></label>
    <input type="text" name="nome" id="nome" value="<?php echo $nome ?>"required>
    <br> <br>
    <label for="nome"><strong>Número: </strong></label>
    <input type="number" maxlength="11" name="number" id="number" value="<?php echo $telefone ?>">
    <br> <br>
    <label for="nome"><strong>Número de referência: </strong></label>
    <input type="number" maxlength="11" name="numberr" id="numberr" value="<?php echo $telefone_referencia ?>">
    <br> <br>
    <label for="nome"><strong>Nome do titular de referência: </strong></label>
    <input type="text" name="nomer" id="nomer"value="<?php echo $titular_referencia ?>">
    <br> <br>
    </div>
    </fieldset>
    <div class="button">
    <input type="submit" name="editar" value="Editar">
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