<?php

$data['titulo']="formulario";
$array=array();
$contador=0;
if(isset($_POST['iniciar'])){
    for($i =0; $i<24;){
        $repetido=false;
        $random=rand(1,90);
        for ($j = 0; $j < count($array); $j++) {
            if($array[$j]==$random){
                $repetido=true;
            }
        }
        if($repetido==false){
            $array[$i]=$random;
            $i++;
        }
    }
    sort($array);
    
}elseif(isset($_POST['carton'])){
    $array= json_decode(urldecode($_POST['carton']));
}else{
    $array=array();
}
$posicion=0;
    $newArray=array();
    for ($a = 0; $a < count($array);$a++) {
        if($posicion==12){
            $newArray[$posicion]= " :)";
            $posicion++;
        }
            $newArray[$posicion]=$array[$a];
            
        
        $posicion++;
    }

    $data['cartulina']=$newArray;
    $data['carton']=$array;
    $a=array();
    $ayuda=false;
    $a=explode(",",json_decode(urldecode($_POST['salida'])));
    if(90==count($a)){
        $ayuda=true;
    }elseif($ayuda==false){
        if(isset($_POST['bola'])){
            $arrayBolas=array();
            $bolarepetida=false;
            $salida= json_decode(urldecode($_POST['salida']));

            if($salida!=null){
                $arrayBolas= explode(",",$salida);
            }
            do{
                $random= rand(1,90);
            }while(in_array($random, $arrayBolas));

            if(count($arrayBolas)== 0){
                $data['salida']=$random;
            }else{
                $data['salida'] =$salida. "," . $random;
            }



            for ($i = 0; $i < count($newArray); $i++) {
                if($random==$newArray[$i]){
                    $newArray[$i]= '<spam style="color:red">' . $newArray[$i] . "</spam>";
                }
            }
                $data['cartulina']=$newArray;

        }
}else{
    
}


include 'views/templates/header.php';
include 'views/bingo.view.php';
include 'views/templates/footer.php';


