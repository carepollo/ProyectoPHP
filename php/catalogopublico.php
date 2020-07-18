<?php
// llamando las herramientas
require_once('global.php');
$categorias = new ContactoDB();
$contenedor = new ElementosHTML();

//haciendo la consulta para obtener datos
$boton_abre_catalogo = $categorias->leerSimple('nombre', 'categorias');

//imprimiendo los datos
for ($i = 0 ; $i < sizeof($boton_abre_catalogo) ; $i++){ 
    echo $contenedor->generar_botonCategoriaPublico($boton_abre_catalogo[$i], $i);
}
for ($i = 0 ; $i < sizeof($boton_abre_catalogo) ; $i++){
    $filtro = $boton_abre_catalogo[$i];
    $producto = $categorias->leerCondicionado('pertenece_categoria, nombre_producto, marca, medida, precio, estado, logo', 'productos', 'pertenece_categoria', $filtro);
    echo '<div class="my-2 collapse" id="catalogo' . $i . '">
            <div class="card card-body">
                <div class="card-title text-center text-white py-2 mb-5 bg-secondary"><h3 class="font-weight-bold">'. $filtro .'</h3></div>
                    <div class="row">';               
    $j = 0;
    $vueltas = 0;
    while ($j < sizeof($producto)){
        if ($vueltas - $vueltas != 0.5) {echo '<div class="col-md-6">';}

        $contenidoCatalogo = $contenedor->generar_productosCatalogoPublico($producto[$j]);
        echo $contenidoCatalogo;

        if ($vueltas - $vueltas != 0.5) {echo '</div>';}
        $j++;
        $vueltas += 0.5;
    }
    echo   '</div>
        </div>
    </div>';       

}

?>