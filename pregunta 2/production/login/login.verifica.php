<?php
    $user = $_POST["user"];
    $pwd = $_POST["password"];
    $nombre = "vacnom";
    $paterno = "vacape";
    session_start();

    include "../conexion.inc.php";
    $query = "SELECT * FROM usuario WHERE ci = '$user' AND contrasenia = '$pwd'";
    $resultado = mysqli_query($con, $query);

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);

        $_SESSION['rol'] = $fila['rol'];
        $_SESSION['ci'] = $fila['ci'];

        if($fila['rol'] == 'kardex') {
            $temporal = mysqli_query($con, "SELECT * FROM kardex WHERE ci = '$user'");
            if (mysqli_num_rows($temporal) > 0) {
                $tempfila = mysqli_fetch_assoc($temporal);
                $nombre = $tempfila['nombre'];
                $paterno = $tempfila['paterno'];
            }
        }
        if($fila['rol'] == 'estudiante') {
            $temporal = mysqli_query($con, "SELECT * FROM alumno WHERE ci = '$user'");
            if (mysqli_num_rows($temporal) > 0) {
                $tempfila = mysqli_fetch_assoc($temporal);
                $nombre = $tempfila['nombre'];
                $paterno = $tempfila['paterno'];
            }
        }

        $_SESSION["user"] = $nombre." ".$paterno;
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION["user"] = "nohay";
        header("Location: login.php");
        exit;
    }
?>
