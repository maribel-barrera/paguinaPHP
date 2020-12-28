

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="recursos/logo.ico">
    <title>Cotización</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
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
                    <a class="nav-link" href="#">Sobre Vortex</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav


    <?php 
    
        //variables del formulario
        $cliente = isset($_POST['inputNombre']) ? $_POST['inputNombre'] : null;
        $numLic = isset($_POST['inputNumLic']) ? $_POST['inputNumLic'] : null; 
        $email  = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : null; 
        $telefono = isset($_POST['inputTel']) ? $_POST['inputTel'] : null;
        $modulosSelected = (isset($_POST['moduls'])) ? $_POST['moduls'] : null;

        const precioLicencia = 900;
        date_default_timezone_set('America/Mexico_City');
        $fechaCot = date("F j, Y, g:i a");
        $folio = random_int(1, 100);


        echo "<div class='row'>";
        echo "<div class='form-group' style='margin: 5%;'>";
    
        echo "<label> Fecha: <b>". $fechaCot . "</b></label><br>";
        echo "<label> Folio: <b>". $folio . "</b></label><br>";

        echo "<label> Cliente: <b>" . $cliente . "</b></label><br>";
        echo "<label> Teléfono: <b>" . $telefono . "</b></label><br>";

        echo "<label> Descripción (Modulos seleccionados) : </label><br>" ; // print_r(array_values ($modulosSelected));
        // echo '<pre>'; print_r($modulosSelected); echo '</pre>';
        /*<?php if($modulosSelected): ?> 
            <li> <strong> Modulo: </strong> <?php echo implode(' - ', $modulosSelected) ?> </li> 
        <?php endif; ?> */

        echo "<label> Precio Licencia = $" . precioLicencia . " </label><br>" ;
        echo "<label> Num Licencias = " . intval($numLic) . " </label><br>" ;   
        echo "<label> Total: <b>$" . (precioLicencia * intval($numLic)) . "</b> </label><br>";

        echo "<label> Observaciones: La presente cotización sólo es de efecto informativo. </label><br>";

        echo "<span class='label label-success'> Cotización enviada correctamente a: <b>" . $email . "</b> </span> ";
        echo "</div> </div>";

    ?>

    <footer>      
        <div>
            <p class="copy-footer-29">ERP Vortex SA de CV © 2020. Todos los derechos reservados | Designed for 
                <a href="https://www.erpvortex.com">ERP Vortex</a></p>         
        </div>     
    </footer>

</body
</html>