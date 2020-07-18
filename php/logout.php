<?php
session_start();
include_once('global.php');
$base = new ContactoDB();
$base->modificarMulti('usuarios', 'estado=0', "id_usuario=".$_SESSION["logged"]);

session_destroy();
header('location: ../index.php');
?>