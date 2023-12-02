<?php
$link=mysqli_connect("localhost","infu324","123456","workflow");
session_start();
$usuario=$_SESSION["ci"];

$resultado = mysqli_query($link,"select * from seguimiento order by secuencia desc");
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $lastsec = $fila['secuencia'];
    $_SESSION["secuencia"] = $lastsec + 1;
}else{
	$_SESSION["secuencia"] = 1;
}

$secuencia = $_SESSION["secuencia"];

$resultadof=mysqli_query($link, "insert into seguimiento(secuencia,usuario,fechahorainicio,fechahorafin,flujo,proceso) values('$secuencia', '$usuario', NOW(), NULL, 'F1', 'P1')");
header("Location: pantalla.php?flujo=F1&proceso=P1");
?>