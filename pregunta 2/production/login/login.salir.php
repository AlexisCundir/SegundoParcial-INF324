<?php
$_SESSION["user"]="nohay";
//eliminar cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// acabar la sesion
session_destroy();
header("Location: login.php");
exit;
?>