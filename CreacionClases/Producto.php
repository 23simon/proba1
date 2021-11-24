<?php

class Producto{
    private $Codigo_producto;
    private $Nombre_producto;
    private $Descripcion;
    private $Proveedor;
    private $Categoria;
    private $Coste;
    private $Margen;
    private $Stock;
    private $IVA;
    private $Productos_relacionados;
    
    public function __construct(string $codigo , string $nombre, string $descripcion,Proveedor $proveedor,Categoria $categoria
            ,float $coste, float $margen , $stock, int $IVA) {
        $this->setCodigo($codigo);
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setProveedor($proveedor);
        $this->setCategoria($categoria);
        $this->setCoste($coste);
        $this->setMargen($margen);
        $this->$stock;
        $this->setIva($IVA);
        $this->Productos_relacionados=array();
    }
    
    public function setCodigo($codigo) {
        if(strlen($codigo)>10 || strlen($codigo)<1){
            throw new Exception("Error");
        }else{
            $this->Codigo_producto= $codigo;
        }
    }
    
    public function getCodigo() {
        return $this->Codigo_producto;
    }


    public function setDescripcion($nombre) {
        $this->Descripcion= $nombre;
    }
    
    public function getDescripcion() {
        return $this->Descripcion;
    }

    public function setProveedor($nombre) {
        $this->Proveedor= $nombre;
    }
    
    public function getProveedor() {
        return $this->Proveedor;
    }
    
    public function setCategoria(Categoria $nombre) {
        $this->Categoria= $nombre;
    }
    
    public function getCategoria() {
        return $this->Categoria;
    }
    
    public function setCoste($coste) {
        if ($coste==0) {
            throw new Exception("Error");
        }else{
            $this->Coste= $coste;
        }
    }
    
    public function getCoste() {
        return $this->Coste;
    }


    public function setMargen($margen) {
        if ($margen==0) {
            throw new Exception("Error");
        }else{
            $this->Margen= $margen;
        }
    }
    
    public function getMargen() {
        return $this->Margen;
    }

    public function getStock() {
        return $this->Stock;
    }
    
    public function setIva($iva) {
        if($iva == (0 || 4 || 10 || 21)){
            $this->IVA= $iva/100;
        }else{
            throw new Exception("Error");
        }
    }
    
    public function getIva() {
        return $this->IVA;
    }

    public function agregarProductoRelacionado(Producto $relacionado) {
        $productos=$this->Productos_relacionados;
        $productos[]=$relacionado;
    }
    
    public function getProductosRelacionados() {
        return $this->Productos_relacionados;
    }
    
    public function getPrecioVenta(bool $conIVA=True ) {
        $coste= $this->Coste;
        $margen= $this->Margen;
        $iva= $this->IVA;
        $precio=0;
        if ($conIVA) {
            $precio= ($coste * $margen) * (1+$iva); 
        }else{
            $precio= ($coste * $margen);
        }     
        return $precio;
    }
    
    public function descontarStock(int $unidades) : void {
        if($this->Stock==0){
            throw new SinStickException("No hay stock de este producto");
        }elseif($unidades <= $this->Stock){
            $this->Stock -= $unidades;
        }else{
            throw new SinStockException("El stock es $this->Stock");
        }
    }
    
    public function agregarStock($unidades) {
        if($unidades<1){
            throw new StockAgregadoException("Introduzca minimo una unidad");
        }else{
            $this->Stock += $unidades;
        }
    }
}