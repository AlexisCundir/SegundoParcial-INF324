<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header("Location: login/login.php");
        exit;
    }
    else{
        if($_SESSION["user"]=="nohay")
        {
            header("Location: login/login.php");
            exit;
        }
    }
?>

<?php
include "conexion.inc.php";

$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$procesosiguiente=$_GET["procesosiguiente"];

$pantalla=$_GET["pantalla"];


if (isset($_GET["Anterior"]))
{
  $resultado=mysqli_query($link, "select * from flujo where flujo='$flujo' and procesosiguiente='$proceso'");
  $fila=mysqli_fetch_array($resultado);
  $procesosiguiente=$fila["proceso"];
}
if (isset($_GET["pregunta"]))
{
  $_SESSION['pregunta'] = $_GET["pregunta"];
  $resultado=mysqli_query($link, "select * from flujopregunta where flujo='$flujo' and proceso='$proceso'");
  
  $fila=mysqli_fetch_array($resultado);
  if ($_GET["pregunta"]=='si')
  {
    $procesosiguiente=$fila["si"];
  }
  else 
  {
    $procesosiguiente=$fila["no"];
  }
}

if (isset($_GET["Anterior"]) && isset($_GET["pregunta"]))
{
  $resultado=mysqli_query($link, "select * from flujo where flujo='$flujo' and procesosiguiente='$proceso'");
  $fila=mysqli_fetch_array($resultado);
  $procesosiguiente=$fila["proceso"];
}
if (isset($_GET["Inicio"]))
{
  header("Location: bandeja.php");
}else{
  include($pantalla.".back.inc.php");
  header("Location: pantalla.php?flujo=$flujo&proceso=$procesosiguiente");
}
?>