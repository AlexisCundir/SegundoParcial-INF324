<?php
// http://localhost/work/pantalla.php?flujo=F1&proceso=P1
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];



$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$resultado=mysqli_query($link, "select * from flujo where flujo='$flujo' and proceso='$proceso'");
if (mysqli_num_rows($resultado) > 0) {
$fila=mysqli_fetch_array($resultado);
$proceso=$fila["proceso"];
$procesosiguiente=$fila["procesosiguiente"];
$pantalla=$fila["pantalla"];
$archivo=$fila["pantalla"].".vista.inc.php";


} else {
	$pantalla = "hijos.php";
	$archivo = "hijoa.php";
	$procesosiguiente=$proceso;
?>

<?php 
}
$actionAnterior = ($proceso == "P1") ? "Inicio" : "Anterior";
$actionSiguiente = ($procesosiguiente == 'FIN') ? "FIN" : "Siguiente";
?>
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

    if($proceso == 'P4' || $proceso == 'P5' || $proceso == 'P6'){
		if($_SESSION["rol"] == 'estudiante'){
			header("Location: kardex.php");
		}
	}else{
		if($_SESSION["rol"] != 'estudiante'){
			header("Location: kardex.php");
		}
	}
?>
<?php
include "vistas/part.cabezera.php";
?>

<form action="motor.php" method="GET">
<input type="hidden" name="pantalla" value="<?php echo $pantalla;?>"/>
<input type="hidden" name="flujo" value="<?php echo $flujo;?>"/>
<input type="hidden" name="proceso" value="<?php echo $proceso;?>"/>
<input type="hidden" name="procesosiguiente" value="<?php echo $procesosiguiente;?>"/>
<?php
include $archivo;
?>
<div class="container">
	<div class="row d_flex">
		<div class="col-md-7">
			<div class="titlepage">
				<?php if ($actionSiguiente !== 'FIN') : ?>
				    <input class="read_more" type="submit" value="<?php echo $actionAnterior ?>" name=" <?php echo $actionAnterior ?>">
				    <input class="read_more" type="submit" value="<?php echo $actionSiguiente ?>" name="<?php echo $actionSiguiente ?>">
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
</form>

