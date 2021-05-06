<?php
require('conexion.php');
$fecha_ini = $_GET['fecha_ini'];
$fecha_final = $_GET['fecha_fin'];


$sql =  "select c.idcliente id,  nombre from  detalle_venta inner join ventas on detalle_venta.idventa = ventas.idventa inner join producto on detalle_venta.idproducto = producto.idproducto inner join cliente c on c.idcliente  =  ventas.idcliente where fecha >='{$fecha_ini}' and fecha <='{$fecha_final}' ";
//$result_query = mysqli_query($conn, $sql) or die(mysql_error());
$result = $conn-> query($sql) or die(mysqli_error());



echo '<option>Elige los datos</option>';
while($row = mysqli_fetch_array($result)){
    
    echo '<option>'.$row['nombre'].'</option>';
    //echo $row['id'];
}



?>