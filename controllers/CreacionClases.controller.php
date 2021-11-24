<?php

include 'CreacionClases/Categoria.php';
include 'CreacionClases/Producto.php';
include 'CreacionClases/Proveedor.php';

$c1 = new Categoria(null,"Electronica");
$c2 = new Categoria($c1,"Moviles");
$c3 = new Categoria($c2,"xiaomi");

echo "<p>". htmlspecialchars($c1->getFullName())."</p>";
echo "<p>". htmlspecialchars($c2->getFullName())."</p>";
echo "<p>". htmlspecialchars($c3->getFullName())."</p>";


$provedor= new Proveedor("r45345534534543","strstgerg","rfasgdgfg","regdfsgs","agfag","gfdagda", "simon@gmail.com",456678654);