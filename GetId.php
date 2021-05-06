<?php
require('conexion.php');
$nombre= $_GET['nombre'];
$sql =  "select idcliente from cliente where nombre = '{$nombre}';";
$result = $conn-> query($sql) or die(mysqli_error());

while($row = mysqli_fetch_array($result)){
 
    echo $row['idcliente'];
}

?>