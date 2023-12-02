<?php
session_start();
$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$usuario=$_SESSION["ci"];
$secuencia = $_SESSION["secuencia"];

//echo $usuario;

$resultadof=mysqli_query($link, "update seguimiento set fechahorafin=NOW() where usuario='$usuario' AND flujo = 'F1' AND proceso = 'P9' AND fechahorafin is null AND secuencia = '$secuencia'");

$resultadof=mysqli_query($link, "select * from seguimiento where usuario='$usuario' AND flujo = 'F1' AND proceso = 'FIN' AND secuencia = '$secuencia'");

if (mysqli_num_rows($resultadof) == 0) {
    $resultadof=mysqli_query($link, "insert into seguimiento(secuencia,usuario,fechahorainicio,fechahorafin,flujo,proceso) values('$secuencia', '$usuario', NOW(), NOW(), 'F1', 'FIN')");
}
header("Location: bandeja.php");
?>