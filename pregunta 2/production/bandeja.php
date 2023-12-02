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
include "vistas/part.cabezera.php";

$link=mysqli_connect("localhost","infu324","123456","workflow");
$rol=$_SESSION["rol"];
$usuario=$_SESSION["ci"];

if($rol == 'estudiante'){
    $sql="SELECT * FROM seguimiento where usuario='".$usuario."' and fechahorafin is null order by fechahorainicio";
}else{
    $sql="SELECT * FROM seguimiento where fechahorafin is null and proceso != 'P7' and proceso != 'P8' order by fechahorainicio";
}


$resultado=mysqli_query($link, $sql);
echo "<div class='table-container'>";
echo "<table class='customers'>";
echo "<tr>";
if($rol != 'estudiante'){
    echo "<td>usuario</td>";
    echo "<td>secuencia</td>";
}
echo "<td>flujo</td>";
echo "<td>proceso</td>";
echo "<td>fecha inicio</td>";
echo "<td>Accion</td>";
echo "</tr>";
while ($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";
    if($rol != 'estudiante'){
        echo "<td>$fila[usuario]</td>";
        echo "<td>$fila[secuencia]</td>";
    }
	echo "<td>$fila[flujo]</td>";
	echo "<td>$fila[proceso]</td>";
	echo "<td>$fila[fechahorainicio]</td>";
	echo "<td><a href='pantalla.php?flujo=$fila[flujo]&proceso=$fila[proceso]&ciest=$fila[usuario]&sec=$fila[secuencia]'>Ver</a></td>";
	echo "</tr>";
}
echo "</table>";
echo "</div>";
if($rol == 'estudiante'){
    echo "<div style = 'margin-left:40%;margin-top:10%'><a href='ini.inscribe.php' class='read_more'>INSCRIBIRSE A MATERIA</a></div>";
}
include "vistas/part.footer.php";
?>
