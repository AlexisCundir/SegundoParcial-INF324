<!-- banner -->
      <div id="myCarousel" class="carousel slide banner_main" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="first-slide" src="images/banner.jpg" alt="First slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <?php
                        if($_SESSION["user"]=="nohay"){
                           echo "<h1> <span></span> INICIA SESION!</h1>";
                           echo "<a href='login/login.php'>Login</a>";
                        }else{
                           echo "<h1> <span>Bienvenid@:</span> ".$_SESSION["user"]."</h1>";
                           echo "<a href='login/login.salir.php'>Salir</a>";
                        };
                     ?>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="first-slide" src="images/banner.jpg" alt="First slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1> <span>Materia:</span> INFORMATICA</h1>
                     <a href="#">Inscribete</a>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="second-slide" src="images/banner.jpg" alt="Second slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1> <span>Materia:</span> MATEMATICA</h1>
                     <a href="#">Inscribete</a>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="third-slide" src="images/banner.jpg" alt="Third slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1> <span>Materia:</span> FISICA</h1>
                     <a href="#">Inscribete</a>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <img class="third-slide" src="images/banner.jpg" alt="four slide">
               <div class="container">
                  <div class="carousel-caption relative">
                     <h1> <span>Materia:</span> QUIMICA</h1>
                     <a href="#">Inscribete</a>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
      <!-- end banner -->