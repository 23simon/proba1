<?php

class Categoria{
    private $nombre;
    private $padre;
    
    public function __construct(?Categoria $p,string $n ) {
        $this->nombre=$n;
        $this->padre=$p;
    }
    
    public function getFullName() : string{
        $res = $this->nombre;
        $actual = $this->padre;
        while($actual!=null){
            $res= $actual->nombre .">". $res;
            $actual = $actual->padre;
        }
        
        return $res;
    }
}