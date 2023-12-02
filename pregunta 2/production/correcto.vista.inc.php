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
          <h1>Se ha validado correctamente</h1>
          <br>
          <h2>Materias Inscritas:</h2>
      </div>
    </div>
  </div>
<?php
$ci=$_SESSION["ciest"];
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$sql="SELECT * FROM mibd_cundir.inscribe i join mibd_cundir.alumno a on i.ci=a.ci where i.ci='$ci'";
$resultado=mysqli_query($link, $sql);
echo "<div class='table-container'>";
echo "<table class='customers'>";
echo "<tr>";
echo "<td>CI</td>";
echo "<td>nombre</td>";
echo "<td>paterno</td>";
echo "<td>Materia</td>";
echo "<td>Estado</td>";
echo "</tr>";
while ($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";
	echo "<td>$fila[ci]</td>";
	echo "<td>$fila[nombre]</td>";
	echo "<td>$fila[paterno]</td>";
	echo "<td>$fila[idmat]</td>";
	echo "<td>";
  echo ($fila['estado'] == 1) ? 'Inscrito' : 'Pendiente';
  echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo "</div>";
?>
<br>