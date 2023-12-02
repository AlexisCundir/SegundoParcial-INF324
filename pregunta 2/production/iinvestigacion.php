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
include "vistas/part.iinvestigacion.php";
include "vistas/part.footer.php";
?>