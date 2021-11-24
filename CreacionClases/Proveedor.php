<?php

include 'CreacionClases/ValorNoValidoException.php';

class Proveedor{
    private $CIF;
    private $Codigo;
    private $Nombre;
    private $Direccion;
    private $Website;
    private $Pais;
    private $Email;
    private $Telefono;
    
    public function __construct($cif,$codigo,$nombre,$direccion,$website,$pais,$email,$telefono) {
        $this->setCif($cif);
        $this->setCodigo($codigo);
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
        $this->setWebsite($website);
        $this->setPais($pais);
        $this->setEmail($email);
        $this->setTelefono($telefono);
    }
    
    
    public function setCif($cif) {
        $cifPartido=str_split($cif);
        self::checkCif($cifPartido);
        $this->CIF=$cif;
    }
    
    private static function checkCif($cifPartido){
        if(count($cifPartido)==9){
            if(is_numeric($cifPartido[0])){
                throw ValorNoValidoException("CIF erroneo");
            }else{
                if(strtoupper($cifPartido[0])==("K" || "P" || "Q" || "S")){
                    if(is_numeric($cifPartido[8])){
                        throw ValorNoValidoException("CIF erroneo");
                    }
                }elseif(strtoupper($cifPartido[0])==("A" || "B" || "E" || "H")){
                    if(!is_numeric($cifPartido[8])){
                        throw ValorNoValidoException("CIF erroneo");
                    }
                }
            }
        }else{
            throw new ValorNoValidoException("CIF erroneo");
        }
    }
    
    public function getCif() {
        return $this->CIF;
    }
    
    public function setCodigo($codigo) {
        self::checkCodigo($codigo);
        $this->Codigo=$codigo;
    }
    
    private static function checkCodigo($codigo){
        if(strlen($codigo)==0 || $codigo===null){
            throw ValorNoValidoException("Introduzca un código");
        }
    }


    public function getCodigo() {
        return $this->Codigo;
    }
    
    public function setNombre($nombre) {
        self::checkNombre($nombre);
        $this->Nombre=$nombre;
    }
    
    private static function checkNombre($nombre){
        if(strlen($nombre)==0 || $nombre===null){
            throw ValorNoValidoException("Introduzca un código");
        }
    }


    public function getNombre() {
        return $this->Nombre;
    }
    
    public function setDireccion($direccion) {
        $this->Direccion=$direccion;
    }
    
    public function getDireccion(){
        return $this->Direccion;
    }
    
    public function setWebsite($website) {
        $this->Website=$website;
    }
    
    public function getWebsite() {
        return $this->Website;
    }
    
    public function setPais($pais) {
        $this->Pais=$pais;
    }
    
    public function getPais() {
        return $this->Pais;
    }
    
    public function setEmail($email) {
        self::checkEmail($email);
        $this->Email=$email;
    }
    
    private static function checkEmail(string $email) : void{
         if($email=="" || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw ValorNoValidoException("Añada bien su email");
        }
    }
    
    public function getEmail() {
        return $this->Email;
    }
    
    public function setTelefono($telefono) {
        self::checkTelefono($telefono);
            $this->Telefono=$telefono;
    }
    
    private static function checkTelefono($telefono){
        if(strlen($telefono)!=9){
            throw ValorNoValidoException("Ponga bien su telefono");
        }
    }


    public function getTelefono(){
        return $this->Telefono;
    }
    
}
