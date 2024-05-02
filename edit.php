
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
        $endereco = $row['endereco'];
    }
    ?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css" />
        <script src="css/js/bootstrap.min.js"> </script>
        <title>Edição de registro</title>
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
    <span class="navbar-brand mb-0 h1 " style="color: green;">Editar Pessoas</span>
    <a class="navbar-brand" href="index.php" style= "color: green;">Página Inicial</a>
    </div>
    </nav>
    </br>
    </br>
    <div class="container p-5 col-sm-8 justify-content-center rounded" style="background-color: rgb(242, 253, 245);">
    <form action="update.php?GetID=<?php echo $cpf ?>" method="POST">
    <center><h1 style="color: green;">Editar Dados</h1></center>
    <hr>
    
    <div class="mb-3">
    <label for="nome" class="form-label"><strong>Nome: </strong></label>
    <input type="text" class="form-control col-sm-5" name="nome" id="nome" value="<?php echo $nome ?>">
    </div>

    <div class="mb-3">
    <label for="nome" class="form-label"><strong>Número: </strong></label>
    <input type="number" class="form-control" maxlength="11" name="number" id="number" value="<?php echo $telefone ?>">
    </div>

    <div class="mb-3">
    <label for="nome"  class="form-label"><strong>Número de referência: </strong></label>
    <input type="number" class="form-control" maxlength="11" name="numberr" id="numberr" value="<?php echo $telefone_referencia ?>">
    </div>

    <div class="mb-3">
    <label for="nome" class="form-label"><strong>Nome do titular de referência: </strong></label>
    <input type="text" class="form-control" name="nomer" id="nomer"value="<?php echo $titular_referencia ?>">
    </div>

    <div class="mb-3">
    <label for="nome" class="form-label"><strong>Novo endereço: </strong></label>
    <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $endereco ?>">
    </div>

    <hr>
    <div class="text-center">
    <div class="d-grid gap-2 col-2 btn-lg mx-auto">
    <input class="btn btn-success" type="submit" name="editar" value="Editar">
    </div>
    </div>
    </form>
    </div>
    </div>
    </body>
    </body>
    </html>