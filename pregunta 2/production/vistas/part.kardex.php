<!-- clients -->
      <div class="clients">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="titlepage">
                     <h2>Bienvenido a Kardex</h2>
                     <span></span>
                  </div>
               </div>
            </div>



            <div class="row">
               <div class="col-md-12">
                  <div class="clients_box">
                     <?php 
                        if($_SESSION["rol"]=="estudiante"){
                           echo "<p>El seguimiento de su tramite esta pendiente a ser atendido por el administrativo correspondiente en Kardex... Por favor sea paciente.</p>";
                        }else{
                           echo "<p>El usuario debe terminar de completar su formulario!.</p>";
                        }

                     ?>
                     
                     <br>
                     <div >
                        <a href="bandeja.php" class="read_more">VOLVER</a>
                     </div>
                     
                  </div>
                  <div class="jonu">
                     <img src="images/cross_img.png" alt="#"/>
                     <?php 
                        echo "<h3>".$_SESSION["user"]."</h3>";
                        echo "<strong>(ROL = ".$_SESSION["rol"].")</strong>";



                        /*
                        if($_SESSION["rol"]=="Docente"){
                           echo "<a class='read_more'>Materia = ".$_SESSION["materia"]."</a>";
                           include "conexion.inc.php";
                           $idmatf = $_SESSION["idmat"];
                           $consulta = mysqli_query($con, "SELECT u.ci, u.nombre, u.paterno, case a.depto
                                                            when '01' then 'Chuquisaca' 
                                                            when '02' then 'La Paz' 
                                                            when '03' then 'Cochabamba'
                                                            when '04' then 'Oruro'
                                                            else 'otro' end departamento, a.promedio
                                                            FROM usuario u
                                                            JOIN alumno a ON u.ci = a.ci_alumno
                                                            JOIN materia m ON a.idmat = m.idmat
                                                            WHERE m.idmat = '$idmatf'");
                           echo "<div class='table-container'>";
                              echo "<table class='customers'>
                                    <tr>
                                       <th>SIGLA</th>
                                       <th>CI</th>
                                       <th>NOMBRE</th>
                                       <th>APELLIDO</th>
                                       <th>DEPARTAMENTO</th>
                                       <th>PROMEDIO</th>
                                       <th>ELIMINAR</th>
                                       <th>MODIFICAR</th>
                                    </tr>";
                           while($registro = mysqli_fetch_array($consulta)){
                              
                              echo "<tr>";
                              echo "<td>" . $_SESSION["idmat"] . "</td>";
                              echo "<td>" . $registro["ci"] . "</td>";
                              echo "<td>" . $registro["nombre"] . "</td>";
                              echo "<td>" . $registro["paterno"] . "</td>";
                              echo "<td>" . $registro["departamento"] . "</td>";
                              echo "<td>" . $registro["promedio"] . "</td>";
                              echo "<td>";
                              echo "<a href='eliminar.php?ci=".$registro["ci"]."'>Eliminar</a>";
                              echo "</td>";
                              echo "<td>";
                              echo "<a href='modificar.php?ci=".$registro["ci"]."'>Modificar</a>";
                              echo "</td>";
                              echo "<tr>";
                              
                            }
                            echo "</table>";
                              echo "</div>";

                              // VER PROMEDIOS X DEPARTAMENTO

                           $consulta = mysqli_query($con, "SELECT case depto
                                       when '01' then 'Chuquisaca' 
                                       when '02' then 'La Paz' 
                                       when '03' then 'Cochabamba'
                                       when '04' then 'Oruro'
                                       else 'otro' end departamento,
                                       sum(promedio) promedio
                                       from alumno
                                       where idmat='$idmatf'
                                       group by case depto
                                       when '01' then 'Chuquisaca'
                                       when '02' then 'La Paz' 
                                       when '03' then 'Cochabamba'
                                       when '04' then 'Oruro'
                                       else 'otro' end");
                           echo "<div class='table-container'>";
                              echo "<table class='customers'>
                                    <tr>
                                       <th>DEPARTAMENTO</th>
                                       <th>PROMEDIO</th>
                                    </tr>";
                           while($registro = mysqli_fetch_array($consulta)){
                              
                              echo "<tr>";
                              echo "<td>" . $registro["departamento"] . "</td>";
                              echo "<td>" . $registro["promedio"] . "</td>";
                              echo "<tr>";
                              
                            }
                           echo "</table>";
                           echo "</div>";

                           // DEPARTAMENTOS X COLUMNAS CON CASE

                           $consulta = mysqli_query($con, "select 
                                                   sum(case when depto='01' then promedio else 0 end) Chuquisaca,
                                                   sum(case when depto='02' then promedio else 0 end) La_Paz,
                                                   sum(case when depto='03' then promedio else 0 end) Cochabamba,
                                                   sum(case when depto='04' then promedio else 0 end) Oruro
                                                   from alumno where idmat='$idmatf';");
                           echo "<div class='table-container'>";
                              echo "<table class='customers'>
                                    <tr>
                                       <th>Chuquisaca</th>
                                       <th>La_Paz</th>
                                       <th>Cochabamba</th>
                                       <th>Oruro</th>
                                    </tr>";
                           while($registro = mysqli_fetch_array($consulta)){
                              
                              echo "<tr>";
                              echo "<td>" . $registro["Chuquisaca"] . "</td>";
                              echo "<td>" . $registro["La_Paz"] . "</td>";
                              echo "<td>" . $registro["Cochabamba"] . "</td>";
                              echo "<td>" . $registro["Oruro"] . "</td>";
                              echo "<tr>";
                              
                            }
                           echo "</table>";
                           echo "</div>";

                           // VER PROMEDIOS X DEPARTAMENTO con arrays

                           $sql = "SELECT case depto
                                       when '01' then 'Chuquisaca' 
                                       when '02' then 'La Paz' 
                                       when '03' then 'Cochabamba'
                                       when '04' then 'Oruro'
                                       else 'otro' end departamento,
                                       sum(promedio) promedio
                                       from alumno
                                       where idmat='$idmatf'
                                       group by case depto
                                       when '01' then 'Chuquisaca'
                                       when '02' then 'La Paz' 
                                       when '03' then 'Cochabamba'
                                       when '04' then 'Oruro'
                                       else 'otro' end";

                           $consulta = mysqli_query($con, $sql);
                           echo "<div class='table-container'>";
                           echo "<table class='customers'><tr>";
                                    while($registro = mysqli_fetch_array($consulta)){
                                       echo "<th>" . $registro["departamento"] . "</th>";
                                    }
                                    echo "</tr>";
                                    echo "<tr>";
                           $consulta = mysqli_query($con, $sql);
                           while($registro = mysqli_fetch_array($consulta)){
                              echo "<td>" . $registro["promedio"] . "</td>";
                            }
                            echo "</tr>";
                           echo "</table>";
                           echo "</div>";

                        }
                        if ($_SESSION["rol"] == "Alumno") {
                           echo "<div class='table-container'>";
                           echo "<table class='customers'>
                                    <tr>
                                       <th>SIGLA</th>
                                       <th>MATERIA</th>
                                       <th>DEPARTAMENTO</th>
                                       <th>PROMEDIO</th>
                                    </tr>";
                           echo "<tr>";
                           echo "<td>" . $_SESSION["idmat"] . "</td>";
                           echo "<td>" . $_SESSION["materia"] . "</td>";
                           echo "<td>" . $_SESSION["depto"] . "</td>";
                           echo "<td>" . $_SESSION["promedio"] . "</td>";
                           echo "<tr>";
                           echo "</table>";
                           echo "</div>";
                        } 
                        */

                     ?>

                  </div>
               </div>
            </div>

            
         </div>
      </div>
      <!-- end clients -->