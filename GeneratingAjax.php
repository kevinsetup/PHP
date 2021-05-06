<?php
require 'conexion.php';
$id = $_GET['id'];
echo $id;

$resp = mysqli_query($conn, "select fecha,nombre, direccion ,  dni ,  p.nomprodu producto, tipodoc documento , numdoc numero ,   cantidad, stock, subtotal  from detalle_venta d join ventas v on v.idventa = d.idventa 
join producto p on p.idproducto = d.idproducto join cliente c on v.idcliente = c.idcliente where c.idcliente = {$id};");
if($resp){
    $xml = new DOMdocument("1.0");
    $xml-> formatOutput = true;
    $fitness = $xml-> createElement("detalle_venta");
    $xml -> appendChild($fitness);

    while ($row = mysqli_fetch_array($resp)) {
        $fecha = $xml-> createElement("fecha", $row["fecha"]);
        $fitness-> appendChild($fecha);
        
        $nombre = $xml-> createElement("nombre", $row["nombre"]);
        $fitness-> appendChild($nombre);

        $direccion = $xml-> createElement("direccion", $row["direccion"]);
        $fitness-> appendChild($direccion);

        $dni = $xml-> createElement("dni", $row["dni"]);
        $fitness-> appendChild($dni);

        $producto = $xml-> createElement("producto", $row["producto"]);
        $fitness-> appendChild($producto);

        
        $documento = $xml-> createElement("documento", $row["documento"]);
        $fitness-> appendChild($documento);

        
        $numero = $xml-> createElement("numero", $row["numero"]);
        $fitness-> appendChild($numero);


        $cantidad = $xml-> createElement("cantidad", $row["cantidad"]);
        $fitness-> appendChild($cantidad);

        $stock = $xml-> createElement("stock", $row["stock"]);
        $fitness-> appendChild($stock);

        $subtotal = $xml-> createElement("subtotal", $row["subtotal"]);
        $fitness-> appendChild($subtotal);


    }
    echo "<xmp>" . $xml->saveXML(). "</xmp>";
    $xml->save("report.xml");

}else{
    echo "error";
}






?>