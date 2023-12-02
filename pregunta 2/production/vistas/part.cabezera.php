<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Carrera</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <?php
         echo "<link rel='stylesheet' href='css/style".$_SESSION["rol"].".css'>";
      ?>
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <link rel="stylesheet" href="css/tablastyle.css">
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  

      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div> 

      end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img src="images/logO.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="header_information">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <?php 
                                    $url = $_SERVER["REQUEST_URI"]; 
                                    if($url == "/production/informacion.php"){
                                       echo "<li class='nav-item active'>";
                                    }else{
                                       echo "<li class=nav-item'>";
                                    }
                                 ?>
                                    <a class="nav-link" href="informacion.php"> Informacion  </a>
                                 </li> 
                                 <?php 
                                    $url = $_SERVER["REQUEST_URI"]; 
                                    if($url == "/production/kardex.php"){
                                       echo "<li class='nav-item active'>";
                                    }else{
                                       echo "<li class=nav-item'>";
                                    }
                                 ?>
                                    <a class="nav-link" href="kardex.php">Kardex</a>
                                 </li>
                                 <?php 
                                    $url = $_SERVER["REQUEST_URI"]; 
                                    if($url == "/production/iinvestigacion.php"){
                                       echo "<li class='nav-item active'>";
                                    }else{
                                       echo "<li class=nav-item'>";
                                    }
                                 ?>
                                    <a class="nav-link" href="iinvestigacion.php">Instituto de Investigacion</a>
                                 </li>
                                 
                                 <li class='nav-item'>
                                 
                                     <?php if ($_SESSION['rol'] == 'kardex') { ?>
                                       <a class="nav-link" href="bandeja.php">Revisar inscripciones</a>
                                     <?php } ?>
                                     <?php if ($_SESSION['rol'] == 'estudiante') { ?>
                                       <!-- <a class="nav-link" href="motor.php?codFlujo=F1&codProceso=P1">Curso de temporada</a></li>
                                       <a class="nav-link" href="motor.php?codFlujo=F1&codProceso=P4">Mis materias</a></li> -->
                                       <a class="nav-link" href="fin.matins.php">Mis materias</a></li>
                                       <a class="nav-link" href="bandeja.php">Curso de temporada</a></li>
                                     <?php } ?>
                                 </li>

                              </ul>

                              <div class="sign_btn">
                                 <?php
                                    if($_SESSION["user"]=="nohay"){
                                       echo "<a href='login/login.php'>LOGIN</a>";
                                    }else{
                                       echo "<a href='login/login.salir.php'>SALIR</a>";
                                    };
                                  ?>
                              </div>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->