<?php
define('S_POST', 'sanitized_post');
define('OPCIONS_VALIDAS', array('a', 'b', 'c'));
define('DEBUG', FALSE);

$data = array();
$data['titulo'] = "Plantilla formulario";
$data["div_titulo"] = "Formulario";

$_customJs = array("vendor/summernote/summernote-bs4.min.js", "assets/pages/js/formulario.view.js");

$data['js'] = $_customJs;
//Por comodidad creamos arrays para las variables que se pueden recibir por post y son arrays


//Comprobamos si se ha enviado el formulario y si es así, lo procesamos
if(isset($_POST['submit'])){
    $data['formSent'] = TRUE;
    $data['post'] = $_POST;
    /*
     * Primero comprobamos los errores y después si no hay errores, se procesaría el formulario. Nombre es un campo obligatorio pero textarea no por eso no lo comprobamos.
     */
    $data['errors'] = checkForm($_POST);
    
    /*
     * Dependiendo del escenario, nos interesa mostrar los datos que insertó el usuario dentro del formulario. Por ejemplo, en un formulario de inserción de datos,
     * si hay un error, no podemos obligar al usuario a meter todos los datos de nuevo si no que debemos mostrar lo que insertó y los errores que hubo. Las variables que insertó
     * debemos "limpiarlas" antes de mostrarlas (por ejemplo quitar etiquetas HTML) ya que un usuario con cierto conocimiento podría desmontarnos nuestra página insertando determinados
     * valores en el código.
     */
    $data[S_POST] = sanitizeInput($_POST);
    
    /**
     * Si no hay errores, ejecutamos la rutina predefinida. Por ejemplo guardar/modificar un registro de datos, generar un documento o realizar cálculos.
     */
    if(count($data['errors']) == 0){
        //Código que realizar la tarea para la que está creado el formulario.
    }
    
    
}
else{
    $data[S_POST]['opcions'] = array();
    $data[S_POST]['selectmultiple'] = array();
    
}

function checkForm(array $_p) : array{
    $_errors = array();
    if(strlen(filter_var($_p['nombre'], FILTER_SANITIZE_STRING)) == 0){
        $_errors['nombre'] = "Inserte un nombre";
    }
    if(!filter_var($_p['url'], FILTER_VALIDATE_URL)){
        $_errors['url'] = "Inserte una URL válida";
    }
    if(!filter_var($_p['selectnormal'], FILTER_VALIDATE_INT) || (int)$_p['selectnormal'] < 1 || (int)$_p['selectnormal'] > 3){
        $_errors['selectnormal'] = "No ha elegido una opción válida";
    }    
    
    if(is_array($_p['selectmultiple'])){        
        foreach($_p['selectmultiple'] as $selected){
            if(filter_var($selected, FILTER_VALIDATE_INT) === false){
                $_errors['selectmultiple'] = "Se ha recibido un valor no válido: $selected";
            }            
        }
    }
    else{
        $_errors['selectmultiple'] = "Tipo de datos incorrecto";
    }
    
    if(is_array($_p['opcions'])){
        foreach($_p['opcions'] as $selected){       
            if(!in_array($selected, OPCIONS_VALIDAS)){
                $_errors['opcions'] = "Se ha recibido un valor no válido: $selected";
            }                       
        }
    }
        
    if(filter_var($_p['email'], FILTER_VALIDATE_EMAIL) === false) {
        $_errors['email'] = "El email recibido no es válido";
    }
    return $_errors;
}

function sanitizeInput(array $_p): array{    
    $data = array();
    
    $data['selectmultiple'] = array();
    if(is_array($_p['selectmultiple'])){        
        foreach($_p['selectmultiple'] as $selected){
            if(filter_var($selected, FILTER_VALIDATE_INT) !== false){
                $data['selectmultiple'][] = $selected;
            }            
        }
    }
    
    $data['opcions'] = array();
    if(is_array($_p['opcions'])){
        foreach($_p['opcions'] as $selected){       
            if(in_array($selected, OPCIONS_VALIDAS)){
                $data['opcions'][] = $selected;
            }                       
        }
    }
    $data['email'] = filter_var($_p['email'], FILTER_SANITIZE_STRING);

    $data['textarea'] = filter_var($_p['textarea'], FILTER_SANITIZE_STRING);
    $data['nombre'] = filter_var($_p['nombre'], FILTER_SANITIZE_STRING);
    $data['url'] = filter_var($_p['url'], FILTER_SANITIZE_STRING);

    //Limpiamos el HTML con el plugin http://htmlpurifier.org/
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $data['summernote'] = $purifier->purify($_p['summernote']);
    return $data;
}

include 'views/templates/header.php';
include 'views/formulario.view.php';
include 'views/templates/footer.php';