<?php

function validarCamposRequeridos($valor){
    if(trim($valor) == '' || strlen($valor) < 2){
        return false;
    }else{
        return true;
    }    
}

function validarNumEntero($valor, $filterParam=null){
    if(filter_var($valor, FILTER_VALIDATE_INT, $filterParam) === FALSE){
       return false;
    }else{
       return true;
    }
}

function validarEmail($valor){
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
       return false;
    }else{
       return true;
    }
}

function validarTelefono($valor){
    //eliminar caracteres - 
    $justNums = preg_replace("/[^0-9]/", '', $valor); 

    //eliminate leading 1 if its there 
    if (strlen($justNums) == 11) 
        $justNums = preg_replace("/^1/", '',$justNums); 

    //validar solo 10 digitos. 
    if (strlen($justNums) == 10) {
       return true;
    }          
}

function enviarCorreo(){
    $to = $email;
    $subject = "Nueva Cotización";
    $message = "Saludos " . $name . ", Hacemos llegar su cotización.";
    $from = "cotizaciones@ejemplo.com";
    $headers = "From: " . $from;
    mail($to, $subject, $message, $headers);
    echo "Correo Enviado!!";
}



?>