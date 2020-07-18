<?php
//Constantes del proyecto para acceder a la base de datos
define('DB_HOSTNAME', 'localhost');
define('DB_DBNAME', 'ferreteriatamayo');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_ENCODE', 'utf8');
define('nombreProyecto', 'Ferreteria Tamayo');

$conexion = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DBNAME);
$conexion->set_charset(DB_ENCODE);

if(mysqli_connect_errno()){
    print('<b>Error en conexion a base de datos:</b> ' . mysqli_connect_error());
}

class ContactoDB{
    private $hostname;
    private $database;
    private $user_db;
    private $password_db;
    private $encode;
    function __construct(){
        $this->hostname = DB_HOSTNAME;
        $this->database = DB_DBNAME;
        $this->user_db = DB_USERNAME;
        $this->password_db = DB_PASSWORD;
        $this->encode = DB_ENCODE;
    }

    // metodo para obtener datos, solo sirve para un solo campo
    function leerSimple($campo, $tabla){
        global $conexion;
        $final = [];
        $consulta = "SELECT $campo FROM $tabla ORDER BY $campo ASC";
        $sqli_resultado = $conexion->query($consulta);
        while($fila = $sqli_resultado->fetch_array()){
            array_push($final, $fila[$campo]);
        }
        return $final;
    }

    // seleccionar datos de la base con condiciones, la variable
    function leerCondicionado($campos, $tabla, $condicion, $valor){
        $conexion = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DBNAME);
        $consulta = "SELECT $campos FROM $tabla WHERE $condicion='$valor' ORDER BY $campos ASC";
        $sqli_resultado = mysqli_query($conexion, $consulta);
        $fila = [];
        $i = 0;
        while($i < mysqli_num_rows($sqli_resultado)){
            array_push($fila, mysqli_fetch_row($sqli_resultado));
            $i += 1;
        }
        return $fila;
    }

    function leerMultiple($campos, $tabla, $condiciones){
        $conexion = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DBNAME);
        $consulta = "SELECT $campos FROM $tabla WHERE $condiciones";
        $sqli_resultado = mysqli_query($conexion, $consulta);
        $fila = [];
        $i = 0;
        while($i < mysqli_num_rows($sqli_resultado)){
            array_push($fila, mysqli_fetch_row($sqli_resultado));
            $i += 1;
        }
        return $fila;
    }

    function leerProtegido($sql, $parametro){
        global $conexion;
        $consulta = $conexion->prepare($sql);
        $consulta->bind_param('i', $parametro);
        $contenido = $contenido = $consulta->execute();
        return $contenido;
    }

    function buscarConectados(){
        global $conexion;
        $consulta = "SELECT estado FROM usuarios WHERE permisos >= 1";
        $resultado = $conexion->query($consulta);
        $conectados = array();
        while($fila = $resultado->fetch_array()){
            if($fila["estado"] >= 1){
                return 1;
            }
            else{
                $respuesta = 0;
            }
        }
        return $respuesta;
    }

    function insertar($tabla, $campos, $valores){
        global $conexion;
        $consulta = "INSERT INTO $tabla ($campos) VALUES ($valores)";
        if ($sqli_resultado = $conexion->query($consulta)){
            return true;
        }
        else {
            return false;
        }
    }

    function modificar($tabla, $campos, $valor, $condicion, $valorCondicion){
        global $conexion;
        $consulta = "UPDATE $tabla SET $campos='$valor' WHERE $condicion='$valorCondicion'";
        $sqli_resultado = $conexion->query($consulta);
    }

    function modificarMulti($tabla, $nueva_caracteristica, $parametros){
        global $conexion;
        $consulta = "UPDATE $tabla SET $nueva_caracteristica WHERE $parametros";
        if($sqli_resultado = $conexion->query($consulta)){
            return true;
        }
        else{
            return false;
        }
    }

    function eliminar($tabla, $condicion, $valor_condicion){
        global $conexion;
        $consulta = "DELETE FROM $tabla WHERE $condicion = $valor_condicion";
        $sqli_resultado = $conexion->query($consulta);
    }

    function destructor(){
        global $conexion;
        $conexion->close();
    }
    
}

class ElementosHTML{
    private $iconoOferta = '<td><i class="fa fa-star modifyicon"></i></td>';
    private $iconoEstandar = '<td><i class="fa fa-times removeicon"></i></td>';
    private $indicadorOferta = '<h5 class="card-title bg-warning p-1 rounded"><i class="fa fa-star"></i> En Oferta</h5>';
    public $señalExitosa = '<script>alertify.success("Acción Exitosa")</script>';
    public $señalFallida = '<script>alertify.error("Ocurrió un Error")</script>';
    public $señalInformativa = '<script>alertify.notify("¡¿?!")</script>';
    public $vendedorActivo = '<label>Vendedor: <span class="badge badge-pill badge-success">Conectado</span><label>';
    public $vendedorDesconectado = '<label>Vendedor: <span class="badge badge-pill badge-danger">Desconectado</span><label>';

    function __construct(){
        $this->señalExitosa;
        $this->señalFallida;
    }

    function generar_botonCategoriaPublico($textoContenido, $enumerador){
        return '<button class="btn btn-primary btn-lg p-5 m-2" type="button" data-toggle="collapse" data-target="#catalogo' . $enumerador . '" aria-expanded="false" aria-controls="catalogo' . $enumerador . '">' . $textoContenido . '</button>';
    }

    function generar_productosCatalogoPublico($caracteristicasProducto){
        if ($caracteristicasProducto[5] ==  0){
            $caracteristicasProducto[5] = '';
        }
        else{
            $caracteristicasProducto[5] = $this->indicadorOferta;
        }
        $resultado = '
        <div class="card mb-3 border-dark mx-1" style="max-width: 540px;">
            <div class="card-header text-center bg-info text-white">
                <h4>' . $caracteristicasProducto[1] . '</h4>
            </div>
            <div class="row no-gutters">
                <div class="col-md-5 text-center">
                    <img src="data:image/png; base64,' . base64_encode($caracteristicasProducto[6]) . '" alt="producto" class="img-fluid">
                </div>
                <div class="col-md-7">
                    <div class="card-body bg-light">
                        <h5 class="card-title"><p class="font-weight-bold d-inline"><i class="fa fa-list"></i> Categoría:</p> ' . $caracteristicasProducto[0] . '</h5>
                        <h5 class="card-title"><p class="font-weight-bold d-inline"><i class="fa fa-file"></i> Marca:</p> ' . $caracteristicasProducto[2] . '</h5>
                        <h5 class="card-title"><p class="font-weight-bold d-inline"><i class="fa fa-arrows-alt"></i> Medida:</p> ' . $caracteristicasProducto[3] . '</h5>
                        <h5 class="card-title"><p class="font-weight-bold d-inline"><i class="fa fa-money"></i> Precio:</p> $' . number_format($caracteristicasProducto[4], 0) . '</h5>'
                        . $caracteristicasProducto[5] .
                    '</div>
                </div>
            </div>
        </div>';
        return $resultado;
    }

    function generar_botonCategoriaPrivado($contenido){
        $identificador = str_replace(' ', '_', $contenido);
        return     '<div class="card-header bg-dark" id="heading-' . $identificador . '">
                        <h5 class="mb-0">
                            <button class="btn text-light" data-toggle="collapse" data-target="#collapse-' . $identificador . '" aria-expanded="true" aria-controls="collapse-' . $identificador . '" id="modifyCategoryTitle-' . $identificador . '" name="modifyCategoryTitle">' . $contenido . '</button>
                            <button class="btn btn-danger mx-1 float-right" name="deleteCategoryAction" id="deleteCategory-' . $identificador . '">Eliminar</button>
                            <button class="btn btn-warning mx-1 float-right" data-toggle="modal" data-target="#modifyCategory" id="modifyCategory-' . $identificador . '" onclick="ajaxValue(' . "'categoryNameModify',['" . $contenido . "','" . $contenido . "']" . ')">Modificar</button>
                        </h5>
                    </div>';
    }

    function generar_productoPrivado($filaactual){
        if ($filaactual[4] == 0){
            $filaactual[4] = $this->iconoEstandar;
        }
        else{
            $filaactual[4] = $this->iconoOferta;
        }
        $resultado =
                    '<tr>
                        <td>
                            <label><i class="fa fa-trash mx-1 removeicon" id="deleteSub-'.$filaactual[7].'" name="'. $filaactual[6] .'"></i></label>
                            <label data-toggle="modal" data-target="#modifyProduct" onclick="ajaxValue_A('. "'modificarSub'" . ",[".$filaactual[7].", '".$filaactual[6]."', '".$filaactual[0]."', '".$filaactual[1]."', '".$filaactual[2]."', ".$filaactual[3]."]" . ')"><i class="fa fa-edit mx-1 modifyicon"></i></label>
                        </td>
                        <td>' . $filaactual[1] . '</td>
                        <td>' . $filaactual[2] . '</td>
                        <td>$' . number_format($filaactual[3], 0) . '</td>'
                        .  $filaactual[4] . 
                    '</tr>';
      return $resultado;
    }

    function convertirId($cadena, $reversa){
        if ($reversa == false) {
            return str_replace(' ', '_', $cadena);
        } else {
            return str_replace('_', ' ', $cadena);
        }
    }

}

?>