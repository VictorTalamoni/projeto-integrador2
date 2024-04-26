<?php
    include('dbconnection.php');

    $cpf = $_GET['Perfil'];
    $query = "select * from pessoas where cpf='".$cpf."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $telefone_referencia = $row['telefone_referencia'];
        $titular_referencia = $row['titular_numero_referencia'];
        $imagem = "fotos/".$row['imagem'];
    }
    ?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="estilo.css"/>
        <link rel="stylesheet" type="text/css" href="css/fontawesome/all.min.css"/>
        <script src="css/js/bootstrap.min.js"> </script>
        <title>Perfil</title>
    </head>
    <body>
    <nav class="navbar " style="background-color: rgb(169, 250, 191);">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 " style="color: black;">Perfil</span>
    <a class="navbar-brand" href="index.php" style= "color: black;">Página Inicial</a>
  </div>
</nav>
        <div class="container-md p-5">
            <div class="row">
                <div class=" rounded col-lg-4 height:100% bg-success text-white text-center py-4">
                    <div class="header-left">
                        <img src="<?php echo $imagem ?>" width="60%" alt="" class="img-thumbnail rounded-circle mb-2">
                        <h1 class="display-6"> <?php echo $nome ?> </h1>
                        <h1 class="display-6"> ‎  </h1>
                        <h1 class="display-6"> ‎ </h1>
                        <h1 class="display-6"> ‎ </h1>
                        <h1 class="display-6"> ‎ </h1>
                        <h1 class="display-6"> ‎ </h1>
                        <h1 class="display-6"> ‎ </h1>
                        <h1 class="display-6"> ‎ </h1>
                        <h1 class="display-6"> ‎ </h1>
                    </div>
                </div>
                <div class="col-lg-8 rounded text-dark text-center py-4 px-5 " style="background-color: rgb(242, 253, 245);">
                    <div class="header-right"> 
                        <p> <?php echo $nome ?> </p>
                    <hr>
                        <p> Número de telefone: <?php echo $telefone ?> </p>
                        <p> Número de referência: <?php echo $telefone_referencia ?> </p>
                        <p> Nome titular de referência: <?php echo $titular_referencia ?> </p>
                        <hr>
                        <p style="vertical-align: bottom">Posicionamento do Mapa</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </body>

    </html>