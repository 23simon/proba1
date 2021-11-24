<?php

$data['titulo'] = "login";
$data["div_titulo"] = "Página login";

if (isset($_POST['submit'])){
    $_POST['nombre'] = preg_replace("/[^a-zA-Z0-9]+/","",$_POST['nombre']);
    
    
    $data['errors'] = checkForm($_POST);
    if(count($data['errors'])==0){
        $estudiosString= cambioValorEstudios($_POST);
        $data['resultado']['nombre']="su nombre se ha corregido a \"" . $_POST['nombre'] . "\"";
        $data['resultado']['pass']="password \"" . $_POST['pass']. "\"";
        $data['resultado']['passConfirm']="su contraseña ha sido confirmada (" . $_POST['passConfirm'] . ")";
        $data['resultado']['email']= "su email ha sido definido como \"" . $_POST['email']. "\"";
        
        if($_POST['estudios']=="Sin estudios"){
           $data['resultado']['estudios']= "usted está \"" . $estudiosString. "\""; 
        }else{
            $data['resultado']['estudios']= "ha cursado \"" . $estudiosString. "\"";
        }
    }
}

function checkForm(array $_p) : array{
    $_errors = array();
    if(is_numeric($_p['nombre'][0])){
        $_errors['nombre']="El nombre debe iniciarse con una letra";
    }
    if ($_p['nombre']=="" || strlen($_p['nombre'])<2 || strlen($_p['nombre'])>15) {
        $_errors['nombre']="Tamaño incorrecto";
    }
    if ($_p['pass']=="" || strlen($_p['pass']) < 8){
        $_errors['pass']= "La contraseña necesita ser mas larga";
    }
    if ($_p['pass']!=$_p['passConfirm']){
        $_errors['passConfirm'] = "Contraseña no confirmada";
    }
    if($_p['email']=="" || !filter_var($_p['email'], FILTER_VALIDATE_EMAIL)){
        $_errors['email']= "añada bien su email";
    }
    if(!is_numeric($_p['estudios'])|| $_p['estudios']<0 || $_p['estudios']>4){
        $_errors['estudios']= "No toques donde no debes tocar";
    }
    return $_errors;
}

function cambioValorEstudios(array $_p){
    
    switch ($_p['estudios']) {
        case "0":
            return "Sin estudios";
        case "1":
            return "Primaria";
        case "2":
            return "Secundaria";
        case "3":
            return "FP";
        case "4":
            return "Universidad";
    }
}

include 'views/templates/header.php';
include 'views/login.view.php';
include 'views/templates/footer.php';