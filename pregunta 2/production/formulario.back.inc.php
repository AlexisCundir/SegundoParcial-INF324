<?php
$ci=$_GET["ci"];
$nombre=$_GET["nombre"];
$paterno=$_GET["paterno"];
$celular=$_GET["celular"];
$materia=$_GET["materia"];

$link=mysqli_connect("localhost","infu324","123456","workflow"); 

$resultadof=mysqli_query($link, "update mibd_cundir.alumno set nombre='$nombre', paterno='$paterno', celular='$celular' where ci='$ci'");
$resultadof=mysqli_query($link, "INSERT INTO mibd_cundir.inscribe(ci, idmat, estado) VALUES('$ci', '$materia', 0)");
?>

<?php
$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$proceso=$_GET["proceso"];
$flujo=$_GET["flujo"];
$usuario=$_SESSION["ci"];
$secuencia = $_SESSION["secuencia"];

$resultadof=mysqli_query($link, "update seguimiento set fechahorafin=NOW() where usuario='$usuario' AND flujo ='$flujo' AND proceso = '$proceso' AND fechahorafin is null AND secuencia = '$secuencia'");

$resultadof=mysqli_query($link, "select * from seguimiento where usuario='$usuario' AND flujo = 'F1' AND proceso = 'P4' AND fechahorafin is null AND secuencia = '$secuencia'");

if (mysqli_num_rows($resultadof) == 0) {
    $resultadof=mysqli_query($link, "insert into seguimiento(secuencia,usuario,fechahorainicio,fechahorafin,flujo,proceso) values('$secuencia', '$usuario', NOW(), NULL, 'F1', 'P4')");
}
?>