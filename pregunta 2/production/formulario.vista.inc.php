
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

<?php
$ci=$_SESSION["ci"];
$link=mysqli_connect("localhost","infu324","123456","workflow"); 
$resultadof=mysqli_query($link, "select * from mibd_cundir.alumno where ci='$ci'");
$filaf=mysqli_fetch_array($resultadof);
$ci=$filaf["ci"];
$nombre=$filaf["nombre"];
$paterno=$filaf["paterno"];
$celular=$filaf["celular"];
?>

<div class="center">
  <h1>Formulario de inscripcion a materia</h1>
  <div class="inputbox">
      <input type="text" name="ci" required="required" value="<?php echo $ci;?>">
      <span>CI</span>
    </div>
    <div class="inputbox">
      <input type="text" name="nombre" required="required" value="<?php echo $nombre;?>">
      <span>Nombre</span>
    </div>
    <div class="inputbox">
      <input type="text" name="paterno" required="required" value="<?php echo $paterno;?>">
      <span>Paterno</span>
    </div>
    <div class="inputbox">
      <input type="text" name="celular" required="required" value="<?php echo $celular;?>">
      <span>Celular</span>
    </div>
    <div class="inputbox">
      <LABEL>Materia</LABEL>
      <select name="materia">
        <option value="FIS001">Física</option>
        <option value="INF001">Informática</option>
        <option value="MAT001">Matemáticas</option>
        <option value="QUI001">Química</option>
      </select>
    </div>
</div>