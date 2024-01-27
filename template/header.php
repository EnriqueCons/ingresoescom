<?php
    $url_base = "http://localhost/WEB/";
?>
<!doctype html>
<html lang="en">
    <head>
        <title>ADMINISTRADOR</title>
        <link rel="shortcut icon" href="<?php echo $url_base;?>imgs/logoESCOM.png">
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="shortcut icon" href="imgs/logoESCOM.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="styleOne.css">


    </head>

    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
            <div class="container">
                <a class="navbar-brand"><span class="text-primary">Administrador</span>ESCOM</a>
                <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navBurguer" 
                aria-controls="navBurguer" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navBurguer">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>modulos/alumnos/">Alumnos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $url_base;?>cerrarAdmin.php">Cerrar sesión</a>
                        </li>
                    </ul>
                  </div>
              </div>
        </nav>
        <br><br><br>
    </header>
        <main class="container">
        <br><br>