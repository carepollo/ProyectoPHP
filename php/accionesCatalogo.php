<?php
// TODOS los metodos LEER no están funcionando correctamente, por tanto no se deben utilizar en este fichero
include_once('global.php');
$base = new ContactoDB();
$contenedores = new ElementosHTML();

// confirmando si se realizo un ajax para insertar categorias
// agregar categoria
if (isset($_POST["categoryName"]) and $_POST["categoryName"] != ""){
    if($base->insertar('categorias', 'nombre', "'" . $_POST["categoryName"] . "'")){
        include_once('catalogoprivado.php');
    }
    else{
        echo "error";
    }
}
//modificar categoria
elseif(isset($_POST["categoryNameModify"]) and isset($_POST["categoryNameReplaced"]) and $_POST["categoryNameModify"] != ""){
    $base->modificar('categorias', 'nombre', $_POST["categoryNameModify"], 'nombre', $_POST["categoryNameReplaced"]);
    include_once('catalogoprivado.php');
}
//ingresar el texto a input de modificar categoria
elseif (isset($_GET["categoryNameModify"])) {
    echo $_GET["categoryNameModify"];
}
//eliminar categoria
elseif(isset($_GET["deleteCategory-"])){
    $base->eliminar('categorias', 'nombre', "'".$_GET["deleteCategory-"]."'");
    include_once('catalogoprivado.php');
}
//ingresar texto a input de agregar producto
elseif (isset($_GET["seleccionarCategoria"])) {
    echo $_GET["seleccionarCategoria"];
}
//agregar producto a determinada categoria
else if(isset($_POST["seleccionarCategoria"]) and
    isset($_POST["seleccionarNombre"]) and $_POST["seleccionarNombre"] != "" and
    isset($_FILES["seleccionarImagen"]) and $_FILES["seleccionarImagen"]["name"] != "" and
    isset($_POST["seleccionarMarca"]) and $_POST["seleccionarMarca"] != "" and
    isset($_POST["seleccionarMedida"]) and $_POST["seleccionarMedida"] != "" and
    isset($_POST["seleccionarPrecio"]) and $_POST["seleccionarPrecio"] != ""){
        $imagen = addslashes(file_get_contents($_FILES["seleccionarImagen"]["tmp_name"]));
        $nombre_categoria = $_POST["seleccionarCategoria"];
        $nombre_producto = $_POST["seleccionarNombre"];
        $marca = $_POST["seleccionarMarca"];
        $medida = $_POST["seleccionarMedida"];
        $precio = $_POST["seleccionarPrecio"];
        if (isset($_POST["seleccionarEstado"]) and $_POST["seleccionarEstado"] == 'on') {
            $estado = 1;
        }
        else{
            $estado = 0;
        }
        $entrada_multiple = "'$nombre_categoria', '$nombre_producto', '$marca', '$medida', $precio, $estado, '$imagen'";
        $comparador = $base->leerCondicionado("nombre_producto, id_producto", 'productos', 'pertenece_categoria' , $nombre_categoria);
        $igualdad =false;
        for ($a = 0 ; $a < sizeof($comparador) ; $a++) {
            if ($nombre_producto == $comparador[$a][0]) {
                $igualdad = true;
            break;
            } else {}
        }

        if($igualdad == false && $base->insertar('productos', 'pertenece_categoria, nombre_producto, marca, medida, precio, estado, logo', $entrada_multiple)){
            $indicador = $contenedores->convertirId($nombre_categoria, false);
            include_once('collapse.php');
            echo json_encode([$indicador, $nuevo_collapse]);
        }
        else{
            echo 'error';
        }

}
//ingresar texto a input agregar ejemplar
elseif (isset($_GET["añadirCategoria"]) and isset($_GET["añadirNombre"]) and $_GET["añadirCategoria"] != "" and $_GET["añadirNombre"] != "") {
    echo json_encode([$_GET["añadirCategoria"], $_GET["añadirNombre"]]);
}
// agregar ejemplar
elseif(isset($_POST["añadirCategoria"]) and $_POST["añadirCategoria"] != "" and
    isset($_POST["añadirNombre"]) and $_POST["añadirNombre"] != "" and
    isset($_POST["añadirMarca"]) and $_POST["añadirMarca"] != "" and
    isset($_POST["añadirMedida"]) and $_POST["añadirMedida"] != "" and
    isset($_POST["añadirPrecio"]) and $_POST["añadirPrecio"] != ""){
        if (isset($_POST["añadirEstado"]) and $_POST["añadirEstado"] == 'on') {
            $estado = 1;
        }
        else{
            $estado = 0;
        }
        $nombre_categoria = $_POST["añadirCategoria"];
        $nombre_producto = $_POST["añadirNombre"];
        $marca = $_POST["añadirMarca"];
        $medida = $_POST["añadirMedida"];
        $precio = $_POST["añadirPrecio"];
        $valores = "'$nombre_categoria', '$nombre_producto', '$marca', '$medida', $precio, $estado";
        $base->insertar('productos', 'pertenece_categoria, nombre_producto, marca, medida, precio, estado', $valores);

        $sql_id = $base->leerMultiple('id_producto', 'productos', "pertenece_categoria='$nombre_categoria' AND nombre_producto='$nombre_producto' AND marca='$marca' AND medida='$medida' AND precio=$precio");
        $id_producto = $sql_id[0][0];
        $sql_imagen = "SELECT logo FROM productos WHERE pertenece_categoria='$nombre_categoria' AND nombre_producto='$nombre_producto' LIMIT 1";
        
        $consulta= "UPDATE productos SET logo=($sql_imagen) WHERE id_producto=$id_producto";
        $conexion->query($consulta);

        $indicador = $contenedores->convertirId($nombre_categoria, false);
        include_once('collapse.php');
        echo json_encode([$indicador, $nuevo_collapse]);
}
//eliminando un grupo de productos
elseif(isset($_GET["deleteProduct-"]) and isset($_GET["categoria"])){
    $base->eliminar('productos', 'nombre_producto', "'".$_GET["deleteProduct-"]."'");
    $nombre_categoria = $_GET["categoria"];
    include('collapse.php');
    $indicador = $contenedores->convertirId($nombre_categoria, false);
    echo json_encode([$indicador, $nuevo_collapse]);
}
//ingresar texto a input modificar ejemplar
elseif (isset($_GET["modificarId"]) and isset($_GET["modificarCategoria"]) and isset($_GET["modificarNombre"]) and isset($_GET["modificarMarca"]) and isset($_GET["modificarMedida"]) and isset($_GET["modificarPrecio"])){
    echo json_encode([$_GET["modificarId"], $_GET["modificarCategoria"], $_GET["modificarNombre"], $_GET["modificarMarca"], $_GET["modificarMedida"], $_GET["modificarPrecio"]]);
}
//modificar datos de ejemplar de un producto
elseif(isset($_POST["modificarId"]) and $_POST["modificarId"] != "" and
    isset($_POST["modificarCategoria"]) and $_POST["modificarCategoria"] != "" and
    isset($_POST["modificarNombre"]) and $_POST["modificarNombre"] != "" and
    isset($_POST["modificarMarca"]) and $_POST["modificarMarca"] != "" and
    isset($_POST["modificarMedida"]) and $_POST["modificarMedida"] != "" and
    isset($_POST["modificarPrecio"]) and $_POST["modificarPrecio"] != ""){
        if (isset($_POST["modificarEstado"]) and $_POST["modificarEstado"] == 'on') {
            $estado = 1;
        }
        else{
            $estado = 0;
        }
    $nombre_categoria = $_POST["modificarCategoria"];
    $datos_ingresar = "marca='".$_POST["modificarMarca"]."', medida='".$_POST["modificarMedida"]."',precio=".$_POST["modificarPrecio"].", estado=".$estado;
    $datos_salen = "pertenece_categoria ='".$_POST["modificarCategoria"]."' AND nombre_producto='".$_POST["modificarNombre"]."' AND id_producto=".$_POST["modificarId"];
    $base->modificarMulti('productos', $datos_ingresar, $datos_salen);
    $indicador = $contenedores->convertirId($nombre_categoria, false);
    include_once('collapse.php');
    echo json_encode([$indicador, $nuevo_collapse]);
}
//eliminar ejemplar
elseif (isset($_GET["deleteSub-"]) and isset($_GET["categoria"])) {
    $base->eliminar('productos', 'id_producto', $_GET["deleteSub-"]);
    $nombre_categoria = $_GET["categoria"];    
    $indicador = $contenedores->convertirId($nombre_categoria, false);
    include_once('collapse.php');
    echo json_encode([$indicador, $nuevo_collapse]);
}
else{
    echo "error";
}


?>