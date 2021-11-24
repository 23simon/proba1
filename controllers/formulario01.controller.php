<?php

define('S_POST', 'sanitized_post');
define('OPCIONS_VALIDAS', array('a', 'b', 'c'));
define('DEBUG', FALSE);

$data['titulo']="formulario";
/*
 * Aquí hacemos los ejercicios y rellenamos el array de datos.
 */

/* Ejercicio 1 */

if(isset($_POST['submit'])){
    /*cosas que no entiendo*/
     $data['formSent'] = TRUE;
    $data['post'] = $_POST;
    
    $data['errors'] = checkForm($_POST);
    
    $data[S_POST] = sanitizeInput($_POST);
     
    /*Fin de cosas que no entiendo*/
     
    $arrayNumeros = filter_var($_POST['numeros'], FILTER_SANITIZE_STRING);
    if(FILTER_VAR($_POST['select'],FILTER_VALIDATE_INT)){
        $ejercicioSeleccionado = $_POST['select'];
        
        if($ejercicioSeleccionado == 1){
            $_numeros=explode(",",$arrayNumeros);
            
            if(esNumero($_numeros)){
                if (count($_numeros) > 0){
                    $min = $_numeros[0];
                    $max = $_numeros[0];
                    
                    foreach ($_numeros as $n){
                        if($n<$min){
                            $min=$n;
                        }elseif($n>$max){
                            $max=$n;
                        }
                    }
                    $data['resultado']= $min . " " . $max;
                }
            }else{
                $data['error_numeros']="Solo números permitidos";
            }
        }elseif($ejercicioSeleccionado == 3){
            $arrayArrays= explode("|", $arrayNumeros);
            
            for ($i = 0; $i < count($arrayArrays); $i++) {
                $arrayArrays[$i]= explode(",", $arrayArrays[$i]);
            }
                
            for ($j = 0; $j < count($arrayArrays); $j++) {
                    
                for ($h = 0; $h < count($arrayArrays[$j]); $h++) {
                    if($h+1==count($arrayArrays[$j])){
                        $l=$j+1;
                    }else{
                        $p=$h+1;
                    }
                    for ($l = 0; $l < count($arrayArrays); $l++) {
                            
                        for ($p = 0; $p < count($arrayArrays[$l]); $p++) {
                                
                            if($arrayArrays[$j][$h]<$arrayArrays[$l][$p]){
                                    
                                $aux=$arrayArrays[$j][$h];
                                    
                                $arrayArrays[$j][$h]=$arrayArrays[$l][$p];
                                    
                                $arrayArrays[$l][$p]=$aux;
                            }
                        }
                    }
                }
            }
            $data['resultado']="";
            for ($i = 0; $i < count($arrayArrays); $i++) {
                for ($j = 0; $j < count($arrayArrays[$i]); $j++) {
                    $data['resultado'].= " " . $arrayArrays[$i][$j];
                }
                $data['resultado'].="<br />";
            }
            
        }elseif($ejercicioSeleccionado == 4){
            $cadena= preg_replace("/[^a-zA-Z0-9]+/","",$data[S_POST]['numeros']);
            var_dump($cadena);
            $newArray= str_split($cadena);
           
            $valores= array_count_values($newArray);
            arsort($valores);
            foreach ($valores as $key => $value) {
                $data['resultado'].=$key . " " . $value . "<br>";
            }
            
        }elseif($ejercicioSeleccionado == 5){
            $cadena= preg_replace("/[^a-zA-Z0-9]+/"," ",$data[S_POST]['numeros']);          
            $newArray = explode(" ", $cadena);
            $valores= array_count_values($newArray);
            arsort($valores);
            foreach ($valores as $key => $value) {
                if($key==null){
                    
                }else{
                    $data['resultado'].=$key . " " . $value . "<br>";
                }
            
                }
            
        }elseif($ejercicioSeleccionado == 6){
            criba($data[S_POST]['numeros']);
            function criba(int $limite) :array{
                $numeros=array();

                for ($i=2; $i <= $limite;$i++){
                    aray_push($numeros,$i);
                }

                for($i=2;$i*$i <= $limite; $i++){
                    if(in_array($i, $numeros) !== FALSE){
                        for($j = $i; $i*$j <= $limite; $j++){
                            $posicion = in_array($i * $j, $numeros);
                            if($posicion !== FALSE){
                                unset($numeros[$posicion]);
                            }
                        }
                    }
                }
                
                $data['resultado']= $numeros;


                
            }
            
        }
            
    }
}

function esNumero(array $_numeros) : bool{
    foreach ($_numeros as $n){
        if(!is_numeric($n)){
            return false;
        }
    }
    return true;
}






function checkForm(array $_p) : array{
    $_errors = array();
    if(!isset($_p['numeros']) || strlen($_p['numeros'])==0){
        $_errors['numeros']="Inserte algún valor";
    }
    if(isset($_p['numeros']) && !ctype_digit($_p['numeros'])){
        $_arrayNums=explode(",",$_p['numeros']);
            if(!esNumero($_arrayNums)){
                $_errors['numeros']="Inserte solo números";
            }
    }
    if(isset($_p['select']) && (!filter_var($_p['select'], FILTER_VALIDATE_INT) || (int)$_p['select'] <1)){
        $_errors['select']="Seleccione una opción válida";
    }
    return $_errors;
}


/*Limpieza y guardado de datos*/

function sanitizeInput(array $_p): array{    
    $data = array();
    
    $data['select'] = filter_var($_p['select'], FILTER_SANITIZE_STRING);
    
    $data['numeros'] = filter_var($_p['numeros'], FILTER_SANITIZE_STRING);

    return $data;
}


include 'views/templates/header.php';
include 'views/formulario01.view.php';
include 'views/templates/footer.php';
