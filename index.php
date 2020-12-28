<?php
    header('Content-Type: text/html; charset=utf-8');
    include 'validaciones.php' ;

    //variables del formulario
    $cliente = isset($_POST['inputNombre']) ? $_POST['inputNombre'] : null;
    $numLic = isset($_POST['inputNumLic']) ? $_POST['inputNumLic'] : null; 
    $email  = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : null; 
    $telefono = isset($_POST['inputTel']) ? $_POST['inputTel'] : null;
    $modulosSelected = (isset($_POST['moduls'])) ? $_POST['moduls'] : null;

    //errores encontrados
    $errores = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (!validarCamposRequeridos($cliente)) {
            $errores[] = 'El campo nombre no puede estar vacio.';
        }

        $numeroValido = array(
            'param' => array(
                'min' => 1, 'max' => 100000
            )
        );
        if (!validarNumEntero($numLic, $numeroValido)) {
            $errores[] = 'El num de licencias es incorrecto.';
        }

        if (!validarEmail($email)) {
            $errores[] = 'El campo email es incorrecto.';
        }

        if(!$errores){
            header('Location: procesarCotizacion.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="recursos/logo.ico">
    <title>Cotización</title>
    
    <!-- Boostrap css CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    
    <!-- NAVEGADOR COMUN-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">
            <img src="recursos/logo.png" width="50" height="50" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if ($errores): ?>
        <ul style="color: #f00;">
            <?php foreach ($errores as $error): ?>
                <li> <?php echo $error ?> </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <form method="POST" action="procesarCotizacion.php" style="margin: 5%;">
        <div class="row">
            <div class="col-6">
           
                <h5>Favor de llenar el siguiente formulario para hacerle llegar su cotización: </h5>

                <div class="form-group">
                    <label for="inputNombre">Nombre: </label>
                    <input type="text" class="form-control" id="inputNombre" name="inputNombre" 
                        maxlength="50">
                </div>

                <div class="form-group">
                    <label for="inputEmpresa">Empresa: </label>
                    <input type="text" class="form-control" id="inputEmpresa" name="inputEmpresa" maxlength="150">
                </div>

                <div class="form-group">
                    <label for="inputNumLicence">Num de Licencias: </label>
                    <input type="number" class="form-control" id="inputNumLicence" name="inputNumLic" minlength="1">
                </div>

                <div class="form-group">
                    <label for="inputEmail">Email: </label>
                    <input type="email" id="inputEmail" name="inputEmail"  class="form-control"
                        placeholder="sucorreo@ejemplo.com" maxlength="80">
                </div>

                <div class="form-group">
                    <label for="inputTel">Teléfono: </label>
                    <input type="tel" class="form-control" id="inputTel" name="inputTel" placeholder="00-0000-0000"
                        maxlength="12">
                </div>
           
            </div>

            <div class="col-6">
                <div class="form-group">
                    <p>Seleccionar el/los modulos de su interés: </p>
                    <div class="form-check">                    
                        <input type="checkbox" name="moduls[]" id="chb1">
                        <label for="chb1">CRM </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="moduls[]" id="chb2">
                        <label for="chb2">Contabilidad </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="moduls[]" id="chb3">
                        <label for="chb3">Obras </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="moduls[]" id="chb4">
                        <label for="chb4">Logistica </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="moduls[]" id="chb5">
                        <label for="chb5">Mercadotenia </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputMessage">Mensaje: </label><br>
                    <textarea name="txtMensaje" class="form-control" id="inputMessage" cols="30" rows="5"
                        maxlength="200"></textarea>
                </div>

                
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">
                    Enviar 
                    </button>
                </div>
            </div>      
        </div>
    </form>

     <!-- Footer para todas las paguinas-->
     <footer>      
        <div>
            <p class="copy-footer-29">ERP Vortex SA de CV © 2020. Todos los derechos reservados | Designed for 
                <a href="https://www.erpvortex.com">ERP Vortex</a></p>         
        </div>     
    </footer>
</body>
</html>