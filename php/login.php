<?php 

require_once('global.php');
$base = new ContactoDB();
$contenedores = new ElementosHTML();
session_start();

if (empty($_POST["username"]) and empty($_POST["password"])) {
    header("location: ../index.php");
}
else{
    $username = base64_encode($_POST["username"]);
    $password = base64_encode($_POST["password"]);

    $sentencia = $conexion->prepare("SELECT nombre_u, clave, id_usuario FROM usuarios WHERE nombre_u = ? AND clave = ?");
    $sentencia->bind_param('ss', $username, $password);
    if($sentencia->execute() == false) {
        header("location: ../index.php");
    }
    else{
        $sentencia->bind_result($name_rest, $key_rest, $id_rest);
        $sentencia->fetch();
        if ($name_rest != $username or $key_rest != $password) {
            header("location: ../index.php");
        }
        else {
            $_SESSION["logged"] = $id_rest;
            $query = "UPDATE usuarios SET estado=1 WHERE id_usuario=$id_rest";
            $conexion->query($query);
            header("location: ../adminperfil.php");
        }
    }
}

?>