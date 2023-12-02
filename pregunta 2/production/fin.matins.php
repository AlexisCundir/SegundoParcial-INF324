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
?>
<style type="text/css">
  @import url("https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@600&display=swap");

  .center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 300px;
  height: 50px;
  margin-bottom: 50px;
}
.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}
.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="button"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="button"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
select {
  border-radius: 10px;
  font-size: 1.2em;
  margin-bottom: 10px;
  margin-top: 10px;
  margin-left: 10px;
  outline: 0;
  background: none;
  border: 2px solid dodgerblue;
  padding: 4px;
  border-radius: 9px;
}
</style>

<br>
  <div class="container">
    <div class="row d_flex">
      <div class="col-md-7">
          <h1>Estudiante</h1>
          <h2><?php $user = $_SESSION["user"]; echo "$user"?></h2>
          <br>
          <h1>Materias:</h1>
      </div>
    </div>
  </div>
<?php

$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$ci=$_SESSION["ci"];
$sql="SELECT * FROM mibd_cundir.inscribe i join mibd_cundir.materia m on i.idmat=m.idmat where i.ci='$ci'";
$resultado=mysqli_query($link, $sql);
echo "<div class='table-container'>";
echo "<table class='customers'>";
echo "<tr>";
echo "<td>Materia</td>";
echo "<td>Descripcion</td>";
echo "<td>Estado</td>";
echo "</tr>";
while ($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";
	echo "<td>$fila[idmat]</td>";
  echo "<td>$fila[descripcion]</td>";
	echo "<td>";
  echo ($fila['estado'] == 1) ? 'Inscrit@' : 'Pendiente';
  echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo "</div>";
?>
<br>