<?php
$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$ci=$_GET["ci"];
$resultadof=mysqli_query($link, "update mibd_cundir.inscribe set estado=1 where ci='$ci'");
?>

<?php
$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$proceso=$_GET["proceso"];
$flujo=$_GET["flujo"];
$usuario=$_SESSION["ciest"];
$secuencia = $_SESSION["sec"];

echo $usuario;

$resultadof=mysqli_query($link, "update seguimiento set fechahorafin=NOW() where usuario='$usuario' AND flujo ='$flujo' AND proceso = '$proceso' AND fechahorafin is null AND secuencia = '$secuencia'");

if($_SESSION["pregunta"] == 'si'){
	$penvia = 'P5';
}else{
	$penvia = 'P6';
}

$resultadof=mysqli_query($link, "select * from seguimiento where usuario='$usuario' AND flujo = 'F1' AND proceso = '$penvia' AND fechahorafin is null AND secuencia = '$secuencia'");

if (mysqli_num_rows($resultadof) == 0) {
    $resultadof=mysqli_query($link, "insert into seguimiento(secuencia,usuario,fechahorainicio,fechahorafin,flujo,proceso) values('$secuencia', '$usuario', NOW(), NULL, 'F1', '$penvia')");
}
?>